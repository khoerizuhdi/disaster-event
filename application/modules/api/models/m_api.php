<?php
class m_api extends CI_Model
{
    public function get_all_bencana()
    {
        $this->db->select('bencana.*, jenis_bencana.jenis_bencana');
        $this->db->from('bencana');
        $this->db->join('jenis_bencana', 'jenis_bencana.id = bencana.jenis_bencana_id');

        return $this->db->get();
    }

    public function get_bencana($id)
    {
        $this->db->select('bencana.*, jenis_bencana.jenis_bencana');
        $this->db->from('bencana');
        $this->db->join('jenis_bencana', 'jenis_bencana.id = bencana.jenis_bencana_id');
        $this->db->where('bencana.id', $id);

        return $this->db->get();
    }

    public function delete_bencana($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('bencana');

        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function add_bencana($data)
    {
        $this->db->insert('bencana', $data);

        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function edit_bencana($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('bencana', $data);

        return ($this->db->affected_rows() != 1) ? false : true;
    }
}
