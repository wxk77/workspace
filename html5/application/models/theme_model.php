<?php
class Theme_model extends CI_Model
{
    public $table;

    public function __construct()
    {
        parent::__construct();
        $this->table = strtolower(str_replace('_model', '', get_class($this)));
    }

    public function add($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function listAll($where = '', $offset = 0, $pagesize = 1)
    {
        $result = $this->db->select("theme.*, count(*) as counts, special.theme")
            ->from("theme")
            ->join("special", "theme.id = special.theme", "left")
            ->group_by("theme.id")
            ->where($where)
            ->limit($pagesize, $offset)
            ->get()
            ->result_array();

        $lists = array();
        foreach ($result as $key=>$item) {
            if ($item['theme'] < 1) {
                $item['counts'] = 0;
            }
            $lists[] = $item;
        }

        return $lists;
    }

    public function demo_count($where = '')
    {
        return $this->db->select("count(*) as total")
            ->from($this->table)
            ->where($where)
            ->get()
            ->row()
            ->total;
    }

}