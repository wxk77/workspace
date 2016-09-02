<?php
class SpecialDatas_model extends CI_Model
{
    public $table;

    public function __construct()
    {
        parent::__construct();
        $this->table = 'special_datas';
    }

    public function create($data)
    {
        $create_time = $update_time = date('Y-m-d H:i:s');
        $sql = "INSERT INTO special_datas(special_id, type, data, create_time, update_time) values";
        $sql.= "('". implode("','", $data). "', ". "'{$create_time}', '{$update_time}')" ;
        $this->db->query($sql);
        return $this->db->insert_id();
    }

    public function fetch($id)
    {
        return $this->db->select("*")
                ->from($this->table)
                ->where('special_id='. $id)
                ->get()
                ->result_array();
    }

    public function fetchHeader($id)
    {
        return $this->db->select("*")
                ->from($this->table)
                ->where(array('special_id'=>$id, 'type'=>1))
                ->get()
                ->row();
    }

    public function fetchContent($id)
    {
        return $this->db->select("")
                ->from($this->table)
                ->where(array('id'=>$id))
                ->get()
                ->row();
    }

    public function modify($id, $data)
    {
        $datas['data'] = json_encode($data, JSON_UNESCAPED_UNICODE);
        $datas['update_time'] = date('Y-m-d H:i:s');

        return $this->db->update($this->table, $datas, array('id'=>$id), 1);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM special_datas WHERE id = ? LIMIT 1";
        return $this->db->query($sql, array($id));
    }
}