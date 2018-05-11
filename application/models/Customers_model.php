<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customers_model extends CI_Model {

    public function get_zakaznik()
    {
       $query = $this->db->get('zakaznik');
        if ($query->num_rows()> 0)
        {
            return $query-> result();
        }
        else {return false;}
    }
    public function get_sportovisko()
    {
        $query = $this->db->get('sportovisko');
        if ($query->num_rows()> 0)
        {
            return $query-> result();
        }
        else {return false;}
    }
    public function get_sportovisko_has_zakaznik()
    {
        $query = $this->db->get('sportovisko_has_zakaznik');
        if ($query->num_rows()> 0)
        {
            return $query-> result();
        }
        else {return false;}
    }
    public function get_zakaznik_data()
    {
        $this->db->select
        (
        '
         zakaznik.Meno as zakaznik_meno,
         sportovisko.id as sport_id,
         sportovisko.Nazov, 
         sportovisko.Cena_za_hodinu,
         sportovisko_has_zakaznik.id as join_id, 
         sportovisko_has_zakaznik.Sportovisko_id, 
         sportovisko_has_zakaznik.Zakaznik_id,
         sportovisko_has_zakaznik.Doba_prenajmu,
         sportovisko_has_zakaznik.Cas_prenajmu'
        );
        $this->db->from ( 'sportovisko_has_zakaznik' );
        $this->db->join ( 'zakaznik', 'zakaznik.id = sportovisko_has_zakaznik.Zakaznik_id');
        $this->db->join ( 'sportovisko', 'sportovisko.id = sportovisko_has_zakaznik.Sportovisko_id');

        $query = $this->db->get ();
        if ($query->num_rows()> 0)
        {
            return $query-> result();
        }
        else {return false;}

    }

    public function add_zakaznik($data_zakaznik)
    {
        $this->db->insert('zakaznik', $data_zakaznik);
        $insert_id = $this->db->insert_id();

        return $insert_id;
    }

    public function add_sportovisko_has_zakaznik($data_zakaznik)
    {
        $this->db->insert('sportovisko_has_zakaznik', $data_zakaznik);
        return $this->db->insert_id();
    }

    public function add_data($id)//$data_zakaznik, $data_sportovisko_has_zakaznik, $data_sportovisko
    {
        $this->db->where('id', $id);
        $data_sportovisko = $this->db->get('sportovisko');
        $data_sportovisko = array
        (
            'Nazov'=>$this->input->post('AAFWF'),
            'Cena_za_hodinu'=>$this->input->post('4')
        );
        $this->db->insert('sportovisko', $data_sportovisko);

        $data_sportovisko_has_zakaznik = array
        (
            'Cas_prenajmu'=>$this->input->post('txt_Cas_prenajmu'),
            'Doba_prenajmu'=>$this->input->post('txt_Doba_prenajmu'),
            'Zakaznik_id'=> $this->db->insert_id()
        );
        $this->db->insert('sportovisko_has_zakaznik', $data_sportovisko_has_zakaznik, $data_sportovisko);

        if ($this->db->affected_rows() > 0)
        {
            return true;
        }
        else {return false;}

    }

    public function add_add($data_zakaznik, $data_sportovisko_has_zakaznik, $data_sportovisko)
    {
         $this->db->insert('zakaznik', $data_zakaznik);
         $data_sportovisko_has_zakaznik['Zakaznik_id'] = $this->db->insert_id();

        $this->db->insert('sportovisko', $data_sportovisko);
        $data_sportovisko_has_zakaznik['Sportovisko_id'] = $this->db->insert_id();

         $this->db->insert('sportovisko_has_zakaznik', $data_zakaznik, $data_sportovisko_has_zakaznik, $data_sportovisko);

        if ($this->db->affected_rows() > 0)
        {
            return true;
        }
        else {return false;}

    }

    public function get_zakaznik_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('zakaznik');

        if ($query->num_rows()> 0)
        {
            return $query-> row();
        }
        else {return false;}
    }

    public function get_sportovisko_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('sportovisko_has_zakaznik', 'sportovisko', 'zakaznik');


        $this->db->select
        ('
         zakaznik.Meno,
         sportovisko.id as sport_id,
         sportovisko.Nazov, 
         sportovisko.Cena_za_hodinu,
         sportovisko_has_zakaznik.id as join_id, 
         sportovisko_has_zakaznik.Sportovisko_id, 
         sportovisko_has_zakaznik.Zakaznik_id,
         sportovisko_has_zakaznik.Doba_prenajmu,
         sportovisko_has_zakaznik.Cas_prenajmu
         '
        );
        $this->db->from ( 'sportovisko_has_zakaznik' );
        $this->db->join ( 'zakaznik', 'zakaznik.id = sportovisko_has_zakaznik.Zakaznik_id');
        $this->db->join ( 'sportovisko', 'sportovisko.id = sportovisko_has_zakaznik.Sportovisko_id');


        if ($query->num_rows()> 0)
        {
            return $query-> row();
        }
        else {return false;}
    }

    public function update_meno()
    {
        $id = $this->input->post('txt_hidden');
        $field = array
        (
            'Meno'=>$this->input->post('txt_Meno')
        );
        $this->db->where('id',$id);
        $this->db->update('zakaznik',$field);
        echo $this->db->last_query();extit;
        if ($this->db->affected_rows() > 0)
        {
            return true;
        }
        else {return false;}
    }

    public function update_sport()
    {
        $id = $this->input->post('hidden_id');
        $field = array
        (
            'Nazov'=>$this->input->post('txt_Sportovisko'),
            'Sportovisko_id'=>$this->input->post('txt_id')
        );
        $this->db->where('id',$id);
        $this->db->update('sportovisko_has_zakaznik',$field);
        echo $this->db->last_query();extit;
        if ($this->db->affected_rows() > 0)
        {
            return true;
        }
        else {return false;}
    }

    public function update_prenajom()
    {
        $id = $this->input->post('txt_hidden_id');
        $field = array
        (
            'Doba_prenajmu'=>$this->input->post('txt_Doba_prenajmu'),
            'Cas_prenajmu'=>$this->input->post('txt_Cas_prenajmu')
        );
        $this->db->where('id',$id);
        $this->db->update('sportovisko_has_zakaznik',$field);
        echo $this->db->last_query();extit;
        if ($this->db->affected_rows() > 0)
        {
            return true;
        }
        else {return false;}
    }

    public function delete($join_id)
    {
        $this->db->where('id', $join_id);
        $this->db->delete('sportovisko_has_zakaznik');
        if ($this->db->affected_rows() > 0)
        {
            return true;
        }
        else {return false;}
    }

    public function delete_sportovisko($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('sportovisko');
        if ($this->db->affected_rows() > 0)
        {
            return true;
        }
        else {return false;}
    }
    public function add_sport()
    {
        $field = array
        (
            'Nazov'=>$this->input->post('txt_add_sport'),
            'Cena_za_hodinu'=>$this->input->post('txt_add_cena')
        );
        $this->db->insert('sportovisko', $field);

        if ($this->db->affected_rows() > 0)
        {
            return true;
        }
        else {return false;}
    }
}