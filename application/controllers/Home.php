<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct()
    {
        parent:: __construct();
        $this->load->model('Customers_model','m');
    }

    public function index()
    {
        $data['zakaznici_data'] = $this->m->get_zakaznik();
        $data['sportoviska_data'] = $this->m->get_sportovisko();
        $data['sportoviska_has_zakazniic_data'] = $this->m->get_sportovisko_has_zakaznik();
        $data['get_zakaznici_data'] = $this->m->get_zakaznik_data();


        $this->load->view('template/header');
        $this->load->view('template/navigation');
        $this->load->view('customers/index', $data);
        $this->load->view('template/footer');

    }

    public function add_zakaznik()
    {
        $data_zakaznik = array
        (
            'Meno'=>$this->input->post('txt_Meno')
        );

        return $this->m->add_post($data_zakaznik);
    }

    public function add_sportovisko_has_zakaznik()
    {
        $data_zakaznik = array
        (
            'Cas_prenajmu'=>$this->input->post('txt_Cas_prenajmu'),
            'Doba_prenajmu'=>$this->input->post('txt_Doba_prenajmu')
        );

        return $this->m->add_post($data_zakaznik);
    }

    public function get_sportovisko()
    {
        $data_zakaznik = array
        (
            'Nazov'=>$this->input->post('txt_Sportovisko'),
        );

        return $this->m->add_post($data_zakaznik);
    }

    public function add_add()
    {
            $data_zakaznik = array(
                'Meno' => $this->input->post('txt_Meno'),
           );

            $data_sportovisko_has_zakaznik = array(
                'Doba_prenajmu'=> $this->input->post('txt_Doba_prenajmu'),
                'Cas_prenajmu' => $this->input->post('txt_Cas_prenajmu'),
           );

           $data_sportovisko = array(
             'Nazov'=> $this->input->post('txt_Sportovisko'),
           );

      //   $this->m->add_add($data_zakaznik, $data_sportovisko_has_zakaznik, $data_sportovisko);
        $data['sportoviska_data'] = $this->m->get_sportovisko();
        // $data['sportoviska_data'] = $this->m->add_sport();
        $this->load->view('template/header');
        $this->load->view('customers/add', $data);
        $this->load->view('template/footer');
    }

    public function add_sport()
    {
        $data['sportoviska_data'] = $this->m->get_sportovisko();
        $this->load->view('template/header');
        $this->load->view('customers/add_sport', $data);
    }

    public function submit()
    {
        $result = $this->m->add_sport();
        if($result)
        {
            $this->session->set_flashdata('success_msg','Údaj bol úspešne pridaný');
        }
        else
        {
            $this->session->set_flashdata('error_msg','Chyba');
        }
        redirect(base_url('home/index'));

    }

    public function submit_sport()
    {
        $result = $this->m->add_sport();

        redirect(base_url('home/add_sport'));

    }

    public function edit_meno($id)
    {
        $data['zakaznici_data'] = $this->m->get_zakaznik_by_id($id);

        $this->load->view('template/header');
        $this->load->view('customers/edit_meno', $data);
        $this->load->view('template/footer');
    }

    public function edit_sport($id)
    {
        $data['sportoviska_data'] = $this->m->get_sportovisko();
        // $data['zakaznicii_data'] = $this->m->get_zakaznik();
        $this->load->view('template/header');
        $this->load->view('customers/edit_sport', $data);
        $this->load->view('template/footer');
    }

    public function edit_prenajom($id)
    {
        $data['zakaznici_data'] = $this->m->get_sportovisko_by_id($id);
        // $data['zakaznicii_data'] = $this->m->get_zakaznik();
        $this->load->view('template/header');
        $this->load->view('customers/edit_prenajom', $data);
        $this->load->view('template/footer');
    }
    public function update_prenajom()
    {
        $result = $this->m->update_prenajom();
        if($result)
        {
            $this->session->set_flashdata('success_msg','Údaj bol úspešne zmenený');
        }
        else
        {
            $this->session->set_flashdata('error_msg','Chyba');
        }
        redirect(base_url('home/index'));
    }

    public function update_meno()
    {
        $result = $this->m->update();
        if($result)
        {
            $this->session->set_flashdata('success_msg','Údaj bol úspešne zmenený');
        }
        else
        {
            $this->session->set_flashdata('error_msg','Chyba');
        }
        redirect(base_url('home/index'));
    }
    public function update_sport()
    {
        $result = $this->m->update_sport();
        if($result)
        {
            $this->session->set_flashdata('success_msg','Údaj bol úspešne zmenený');
        }
        else
        {
            $this->session->set_flashdata('error_msg','Chyba');
        }
        redirect(base_url('home/index'));
    }


    public function delete($join_id)
    {
        $result = $this->m->delete($join_id);
        if($result)
        {
            $this->session->set_flashdata('success_msg','Údaj bol úspešne vymazaný');
        }
        else
        {
            $this->session->set_flashdata('error_msg','Chyba');
        }
        redirect(base_url('home/index'));
    }

    public function delete_sportovisko($id)
    {
        $result = $this->m->delete_sportovisko($id);
        if($result)
        {
            $this->session->set_flashdata('success_msg','Údaj bol úspešne vymazaný');
        }
        else
        {
            $this->session->set_flashdata('error_msg','Chyba');
        }
        redirect(base_url('home/add_sport'));
    }
}