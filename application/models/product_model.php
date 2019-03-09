<?php
class product_model extends CI_Model
{
    public function get()
    {
        return $this->db->select('*')->from('tcard')->get()->result();
    }

    public function getByid($id)
    {
        return $this->db->get_where('tcard', array('id' => $id))->result_array();

    }

    public function save()
    {
        $data = [
            'nama' => $this->input->post('nama'),
            'nokk' => $this->input->post('nokk'),
            'nik' => $this->input->post('nik'),
            'alamat' => $this->input->post('alamat'),

        ];
        return $this->db->insert('tcard', $data);

    }

    public function update()
    {
        $data = [
            'id' => $this->input->post('id'),
            'nama' => $this->input->post('nama'),
            'nokk' => $this->input->post('nokk'),
            'nik' => $this->input->post('nik'),
            'alamat' => $this->input->post('alamat'),

        ];
        $this->db->update('tcard', $data, array('id' => $this->input->post('id')));

    }

    public function hapus($id)
    {
        $this->db->delete('tcard', ['id' => $id]);
    }

}
