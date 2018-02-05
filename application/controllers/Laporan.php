<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library("PHPExcel");
        $this->load->model('KaryawanModel');
    }

	public function index()
	{
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
            $this->export_karyawan();
        } else {
            redirect('/');
        }
    }

    public function export_karyawan(){
        $objPHPExcel = new PHPExcel();
        $query = $this->KaryawanModel->getkaryawan_report();

        $objPHPExcel->getProperties()->setTitle("export")->setDescription("none");
 
        $objPHPExcel->setActiveSheetIndex(0);
 
        // Field names in the first row
        $fields = $query->list_fields();
        $col = 0;
        foreach ($fields as $field)
        {
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, $field);
            $col++;
        }
 
        // Fetching the table data
        $row = 2;
        foreach($query->result() as $data)
        {
            $col = 0;
            foreach ($fields as $field)
            {
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $data->$field);
                $col++;
            }
 
            $row++;
        }
 
        $objPHPExcel->setActiveSheetIndex(0);
 
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
 
        // Sending headers to force the user to download the file
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="DataKaryawan_'.date('dMy').'.xls"');
        header('Cache-Control: max-age=0');
 
        $objWriter->save('php://output');
    }
}