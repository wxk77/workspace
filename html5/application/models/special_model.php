<?php
class Special_model extends CI_Model
{
    public $table;

    public function __construct()
    {
        parent::__construct();
        $this->table = strtolower(str_replace('_model', '', get_class($this)));
    }

    public function create($data)
    {
        $create_time = $update_time = date('Y-m-d H:i:s');
        $sql = "INSERT INTO special(theme, title, share_title, share_link, share_desc, share_image, username, create_time, update_time) values";
        $sql.= '("'. implode('","', $data). '", '. "'{$create_time}', '{$update_time}')" ;
        $this->db->query($sql);
        return $this->db->insert_id();
    }

    public function lists($where = '', $offset = 0, $pagesize = 1)
    {
        return $this->db->select('*')
            ->from("special")
            ->where($where)
            ->limit($pagesize, $offset)
            ->get()
            ->result_array();

    }

    public function count($where)
    {
        return $this->db->select("count(*) as total")
            ->from($this->table)
            ->where($where)
            ->get()
            ->row()
            ->total;
    }

    public function fetch($id)
    {
        return $this->db->select('*')->from($this->table)->where('id='. $id)->get()->row();
    }

    public function modify($id, $data)
    {
        $data['update_time'] = date('Y-m-d H:i:s');
        return $this->db->update($this->table, $data, "id=".$id, 1);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM special WHERE id = ? LIMIT 1";
        $result1 = $this->db->query($sql, array($id));

        $sql = "DELETE FROM special_datas WHERE special_id = ?";
        $result2 = $this->db->query($sql, array($id));

        return $result1 && $result2;
    }
}