<?php

if (!defined('BASEPATH'))
    exit('No direct script  allow');

class Generic_model extends CI_Model {
    
 
     function expenseGraph() {
        
        $query = $this->db->query("SELECT "
                . "(select sum(amount) from expensedetail where type='Disablechildren' and is_deleted=0) as Disablechildren,"
                . "(select sum(amount) from expensedetail where type='Orphans' and is_deleted=0) as Orphans,"
                . "(select sum(amount) from expensedetail where type='Widows' and is_deleted=0) as Widows,"
                . "(select sum(amount) from expensedetail where type='Education' and is_deleted=0) as Education,"
                . "(select sum(amount) from expensedetail where type='Kashmir' and is_deleted=0) as Kashmir,"
                . "(select sum(amount) from expensedetail where type='Poorwomen' and is_deleted=0) as Poorwomen,"
                . "(select sum(amount) from expensedetail where type='Quranandislamicteachings' and is_deleted=0) as Quranandislamicteachings,"
                . "(select sum(amount) from expensedetail where type='Traditionalschooling' and is_deleted=0) as Traditionalschooling,"
             
                
                . "(select sum(amount) from expensedetail where type='Poorchildren' and is_deleted=0) as Poorchildren");
             //   . "(select sum(amount) from expensedetail where type=Poor children and is_deleted=0) as poorchildren,"

        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            return $result[0];
        } else {
            return FALSE;
        }
    }
    
     function expenseGraph2() {
        
         
     
        $this->db->select('sum(p.amount) as amount ')
        ->from('expensedetail as p')

 //               ->join('subcategory as sub','sub.id=p.type')
       
        ->where(array('p.is_deleted'=>0,'p.type'=>$id));
     //   ->order_by("p.id","DESC");
        
        $w=$this->db->get()->row_array();
        if ($w->num_rows()  > 0){
        return $w['amount'];}
        else {return 0; }
     
    }
    
     function expenseGraph3() {
        
         
     
        $this->db->select('p.id as id,sub.heading as heading,sub.category as category ,sum(p.amount) as amount,')
        ->from('expensedetail as p')

                ->join('subcategory as sub','sub.id=p.type')
       
        ->where(array('p.is_deleted'=>0,'sub.category'=>"Help Others"));
     //   ->order_by("p.id","DESC");
        
         $w=$this->db->get();
        if ($w->num_rows() > 0){
        return $w->result_array();}
        else {return FALSE; }
    }
    
    
      public function getProduct(){
        $this->db->select('e.id as id,e.heading as heading,e.product_type as product_type,e.price as price,u.name as unit,pt.name as producttype')
        ->from('product as e')
//        $a=p.id.poorchild;
                ->join('unit as u','e.unit_id=u.id')
                ->join('producttype as pt','pt.id=e.product_type')
       
        ->where(array('e.is_deleted'=>0,'e.status'=>0))
        ->order_by("e.id","DESC");
        
        $w=$this->db->get();
     
        return $w->result_array();
       
    }
     public function getProductPriceHistory(){
        $this->db->select('e.id as id,e.heading as heading,e.product_type as product_type,e.price as price,u.name as unit,pt.name as producttype,e.createdAt as createdAt,e.modifiedAt as modifiedAt')
        ->from('product as e')
//        $a=p.id.poorchild;
                ->join('unit as u','e.unit_id=u.id')
                ->join('producttype as pt','pt.id=e.product_type')
       
        ->where(array('e.is_deleted'=>0,'e.status'=>1))
        ->order_by("e.id","DESC");
        
        $w=$this->db->get();
        
        return $w->result_array();
            }
    
      public function gethelpothercontent($id){
        $this->db->select('p.id as id,p.heading as heading,p.description as description, pi.path as img,pi.type as type ')
        ->from('helpotherscontent as p')
//        $a=p.id.poorchild;
                ->join('subcategory as sub','sub.id=p.sub_cat_id')
                ->join('property_images as pi','pi.name=p.id')
       
        ->where(array('p.is_deleted'=>0,'pi.type'=>"helpother",'p.sub_cat_id'=>$id))
        ->order_by("p.id","DESC");
        
        $w=$this->db->get();
        if ($w->num_rows() > 0){
        return $w->result_array();}
        else {return FALSE; }
    }
    
     public function getPoorchild(){
        $this->db->select('p.id as id,p.heading as heading,p.description as description, pi.path as img,pi.type as type ')
        ->from('poorchild as p')
//        $a=p.id.poorchild;
                ->join('property_images as pi','pi.name=p.id')
       
        ->where(array('p.is_deleted'=>0,'pi.type'=>"poorchild"))
        ->order_by("p.id","DESC");
        
        $w=$this->db->get();
        if ($w->num_rows() > 0){
        return $w->result_array();}
        else {return FALSE; }
    } 
     public function getslider(){
        $this->db->select('p.id as id,p.heading as heading,p.description as description, pi.path as img,pi.type as type ')
        ->from('slider as p')
//        $a=p.id.poorchild;
                ->join('property_images as pi','pi.name=p.id')
       
        ->where(array('p.is_deleted'=>0,'pi.type'=>"slider"))
        ->order_by("p.id","DESC");
        
        $w=$this->db->get();
        if ($w->num_rows() > 0){
        return $w->result_array();}
        else {return FALSE; }
    } 
     public function getdisablechild(){
        $this->db->select('p.id as id,p.heading as heading,p.description as description, pi.path as img,pi.type as type ')
        ->from('disablechild as p')
//        $a=p.id.poorchild;
                ->join('property_images as pi','pi.name=p.id')
       
        ->where(array('p.is_deleted'=>0,'pi.type'=>"disablechild"))
        ->order_by("p.id","DESC");
        
        $w=$this->db->get();
        if ($w->num_rows() > 0){
        return $w->result_array();}
        else {return FALSE; }
    } 
     public function getqurbani(){
        $this->db->select('p.id as id,p.heading as heading,p.description as description, pi.path as img,pi.type as type ')
        ->from('qurbaniappeal as p')
//        $a=p.id.poorchild;
                ->join('property_images as pi','pi.name=p.id')
       
        ->where(array('p.is_deleted'=>0,'pi.type'=>"disablechild"))
        ->order_by("p.id","DESC");
        
        $w=$this->db->get();
        if ($w->num_rows() > 0){
        return $w->result_array();}
        else {return FALSE; }
    } 
     public function getorphansinneed(){
        $this->db->select('p.id as id,p.heading as heading,p.description as description, pi.path as img,pi.type as type ')
        ->from('orphansinneed as p')
//        $a=p.id.poorchild;
                ->join('property_images as pi','pi.name=p.id')
       
        ->where(array('p.is_deleted'=>0,'pi.type'=>"disablechild"))
        ->order_by("p.id","DESC");
        
        $w=$this->db->get();
        if ($w->num_rows() > 0){
        return $w->result_array();}
        else {return FALSE; }
    }     
     public function getneedywidows(){
        $this->db->select('p.id as id,p.heading as heading,p.description as description, pi.path as img,pi.type as type ')
        ->from('needywidows as p')
//        $a=p.id.poorchild;
                ->join('property_images as pi','pi.name=p.id')
       
        ->where(array('p.is_deleted'=>0,'pi.type'=>"disablechild"))
        ->order_by("p.id","DESC");
        
        $w=$this->db->get();
        if ($w->num_rows() > 0){
        return $w->result_array();}
        else {return FALSE; }
    }     
     public function getramzanappeal(){
        $this->db->select('p.id as id,p.heading as heading,p.description as description, pi.path as img,pi.type as type ')
        ->from('ramzanappeal as p')
//        $a=p.id.poorchild;
                ->join('property_images as pi','pi.name=p.id')
       
        ->where(array('p.is_deleted'=>0,'pi.type'=>"ramzanappeal"))
        ->order_by("p.id","DESC");
        
        $w=$this->db->get();
        if ($w->num_rows() > 0){
        return $w->result_array();}
        else {return FALSE; }
    }     
         public function getelderlywomen(){
        $this->db->select('p.id as id,p.heading as heading,p.description as description, pi.path as img,pi.type as type ')
        ->from('elderlywomen as p')
//        $a=p.id.poorchild;
                ->join('property_images as pi','pi.name=p.id')
       
        ->where(array('p.is_deleted'=>0,'pi.type'=>"disablechild"))
        ->order_by("p.id","DESC");
        
        $w=$this->db->get();
        if ($w->num_rows() > 0){
        return $w->result_array();}
        else {return FALSE; }
    }     
    
    
     public function getPlaceaddphase10(){
        $this->db->select('p.id as id,p.property_type as property_type,p.block as block,p.mouza as mouza,p.floor as floor,p.bathroom as bathroom,p.roadonfront as roadonfront,p.detail as detail,p.emeter as emeter,p.farea as farea,p.land_type as land_type,p.paper_type as paper_type,p.area as area,p.carea as carea ,p.rlocality as rlocality,p.title as title, p.demand as demand , pi.path as img,c.name as city ,s.name as society ,ph.name as phase ')
        ->from('placeadd as p')
        ->join('property_images as pi','pi.name=p.id')
        ->join('city as c', 'c.id = p.city_id')
         ->join('society as s', 's.id = p.society_id')
        ->join('phases as ph', 'ph.id = p.phase_id')        
     //   ->join('client as c', 'c.id = f.client_id')
        
        ->where(array('p.is_deleted'=>0,'p.phase_id'=>11))
        ->order_by("p.id","DESC");
        
        $w=$this->db->get();
        if ($w->num_rows() > 0){
        return $w->result_array();}
        else {return FALSE; }
    } 
     public function getPlaceaddfile(){
        $this->db->select('p.id as id,p.property_type as property_type,p.land_type as land_type,p.paper_type as paper_type,p.area as area,p.carea as carea,p.title as title,p.rlocality as rlocality, p.demand as demand , pi.path as img ')
        ->from('placeadd as p')
        ->join('property_images as pi','pi.name=p.id')
      //  ->join('project as p', 'f.project_id = p.id')
     //   ->join('client as c', 'c.id = f.client_id')
        
        ->where(array('p.is_deleted'=>0,"p.paper_type"=>'file'))
        ->order_by("p.id","DESC");
        
        $w=$this->db->get();
        if ($w->num_rows() > 0){
        return $w->result_array();}
        else {return FALSE; }
    } 
     public function getPlaceaddregister(){
        $this->db->select('p.id as id,p.property_type as property_type,p.land_type as land_type,p.paper_type as paper_type,p.area as area,p.carea as carea,p.title as title, p.demand as demand ,p.rlocality as rlocality , pi.path as img ')
        ->from('placeadd as p')
        ->join('property_images as pi','pi.name=p.id')
      //  ->join('project as p', 'f.project_id = p.id')
     //   ->join('client as c', 'c.id = f.client_id')
        
        ->where(array('p.is_deleted'=>0,"p.paper_type"=>'registery'))
        ->order_by("p.id","DESC");
        
        $w=$this->db->get();
        if ($w->num_rows() > 0){
        return $w->result_array();}
        else {return FALSE; }
    } 
    
    function save($data) 
    {
        $this->db->insert('income', $data);
        if ($this->db->insert_id()>0)
            return TRUE;
        return FALSE;
    
    }
	
	
	 function getAllRecordss($table,$by,$where) {
        $this->db->select()->from($table)->where($where)->order_by($by);
        $query=$this->db->get();
        if ($query->num_rows() > 0)
            return $query->result_array();
        else
            return FALSE;
    }
    function insert($table, $data) {
        $this->db->insert($table, $data);
        if ($this->db->insert_id() > 0)
            return $this->db->insert_id();
        else
            return FALSE;
    }
    function getAllRecords($table,$where,$by,$order) {
        $this->db->select()->from($table)->where($where)->order_by($by,$order);
        $query=$this->db->get();
        if ($query->num_rows() > 0)
            return $query->result_array();
        else
            return FALSE;
    }
    function getAllRecordsLike($table,$where,$colm,$like,$by,$order) {
        $this->db->select()->from($table)->where($where)->like($colm,$like)->order_by($by,$order);
        $query=$this->db->get();
        if ($query->num_rows() > 0)
            return $query->result_array();
        else
            return FALSE;
    }
    function getAllRecordsbyLimit($table,$where,$by,$order,$limit,$start) {
        $this->db->select()->from($table)->where($where)->order_by($by,$order)->limit($limit , $start);
        $query=$this->db->get();
        if ($query->num_rows() > 0)
            return $query->result_array();
        else
            return FALSE;
    }
    function getSpecificRecord($table,$where) {
        $this->db->select()->from($table)->where($where);
        $query=$this->db->get();
        if ($query->num_rows() > 0)
        {
            $result= $query->result_array();
            return $result[0];
        }  
        else
        {return FALSE;}
            
    }
    public function updateRecord($table,$set, $where) {
        $this->db->update($table, $set, $where);
        if ($this->db->affected_rows() > 0)
            return TRUE;
        else 
            return FALSE;
    }
    public function delete($table,$where){ 
        
        $this->db->where($where);
        $this->db->delete($table); 
    }
    public function getMaxId($table){ 
       $query=$this->db->query("SELECT max(id) as max FROM $table ");
        
        if ($query->num_rows() > 0){
             $result= $query->result_array();
            return $result[0];
        }
        else{
            return FALSE;
    }
    }
    public function getCount($table,$where){ 
       $query=$this->db->query("SELECT count(id) as count FROM $table $where");
        
        if ($query->num_rows() > 0){
             $result= $query->result_array();
            return $result[0];
        }
        else{
            return FALSE;
    }
    }
    
    function getSpecificMaxId($table,$where,$coloumn)
    {
        $this->db->select_max("$coloumn")
        ->from($table)->where($where);
        $query = $this->db->get();
        if ($query->num_rows() > 0)
        {
            $result= $query->result_array();
            return $result[0];
        }
        else
        {
            return FALSE;
        }
    }
    
    function get_distinct($table,$field) 
    {
        $this->db->select("DISTINCT($field)")->from($table)->order_by($field,"ASC");
        $query = $this->db->get();
        if ($query->num_rows() > 0)
            return $query->result_array();
        else
            return FALSE;
    }
    
    function get_distinctwhere($table,$field,$where) 
    {
        $this->db->select("DISTINCT($field)")->from($table)->where($where)->order_by($field,"ASC");
        $query = $this->db->get();
        if ($query->num_rows() > 0)
            return $query->result_array();
        else
            return FALSE;
    }
    function getData($table,$fields,$where,$by) 
    {
        $this->db->select("$fields")->from($table)->where($where)->order_by($by,"ASC");
        $query = $this->db->get();
        if ($query->num_rows() > 0)
            return $query->result_array();
        else
            return FALSE;
    }
    public function extra() 
    {
        $this->db->select('lhw.id as LhwId,lhw.name as LHW Name,lhw.phone as Phone, vill.village as Village, count(sub.id) as SujectForms')
            ->from('dekho_lhw as lhw')
            ->join('dekho_villages As vill','lhw.parentId=vill.id')
            ->join('subjects As sub','sub.lhw=lhw.id')
            ->where(array(
                'vill.assignment'=>1,
                'vill.status'=>1,
                'sub.is_deleted' => 0,
                'lhw.status'=>1,
               ))
            ->group_by('lhw.id');
        $query = $this->db->get();
        if ($query->num_rows() > 0)
            return $query->result_array();
        else
            return FALSE;
    }
    function getSubjects()
	{
        $this->db->select("sub.language,sub.msgReceivingTime,cal.id as recordId,cal.message,cal.arm,cal.system_week,cal.subjectId")
            ->from('call_record as cal')
            ->join('subjects As sub','cal.subjectId=sub.id')
            ->where(array(
                "cal.system_week"=>14,
                "cal.is_deleted"=>0
               ));
            
        $query = $this->db->get();
        if ($query->num_rows() > 0)
            return $query->result_array();
        else
            return FALSE;
    }
    //$table,$by,$where
	public function program($where) 
    {
		$this->db->select('incs.id,incs.channel as channel,incs.item as Item,incs.name as Name,  incs.cashPromised as CashPromised, incs.cashReceived as cashReceived, incs.cashRemaining as cashRemaining,st.name as status , us.firstName as Client, used.firstName as Agent')
        
        ->from('income as incs')
        ->join('users as us', 'us.id = incs.client')
        ->join('status as st', 'incs.status = st.id')
        ->join('users as used', 'used.id = incs.agent')
        ->where(array('incs.item' => $where,'incs.is_deleted'=>0))
        ->order_by("incs.id","DESC");
        
        $query=$this->db->get();
        if ($query->num_rows() > 0)
            return $query->result_array();
        else
            return FALSE;
		
    }
public function advertisementt($where)
		{
			$this->db->select('inc.id,inc.channel as channel,inc.item as Item,inc.name as Name,inc.cashPromised as CashPromised,inc.cashReceived as CashReceived,inc.cashRemaining as cashRemaining ')
			->from('income as inc')
			->join('users as us','us.id=inc.client')
			->join('status as st','inc.status=st.id')
			->where(array('inc.item'=>$where,'inc.is_deleted'=>0))
			->order_by("inc.id","DESC");
			$query=$this->db->get();
			if($query->num_rows()>0)
			return $query->result_array();
			else
			return FALSE;
			}

public function officeexpense($where) 
    {
		$this->db->select('exp.id,exp.expenseOn as expenseOn,exp.paymentTo as paymentTo,exp.detail as detail,exp.cash as cash, us.firstName as employee')
        
        ->from('expense as exp')
        ->join('users as us', 'us.id = exp.paymentTo')
        ->join('status as st', 'exp.status = st.id')
        
        ->where(array('exp.expenseOn' => $where,'exp.is_deleted'=>0))
        ->order_by("exp.id","DESC");
        
        $query=$this->db->get();
        if ($query->num_rows() > 0)
            return $query->result_array();
        else
            return FALSE;
		
    }
    function extra1() 
    {
        $this->db->select('is.district_center as district,dis.uniqueId as districtId,cen.district_center as tehsil,cen.uniqueId as tehsilid,un.union as unionName,un.unionId,vill.village,vill.villageId,vill.assignment as Assignment,lhw.name as LhwName,lhw.phone as Phone')
        ->from('dekho_lhw as lhw')
        ->join('dekho_villages As vill','lhw.parentId=vill.id')
        ->join('dekho_union As un','vill.unionId=un.id')
        ->join('dekho_districts As cen','vill.centerId=cen.id')
        ->join('dekho_districts As dis','cen.parentId=dis.id')
        ->where(array(
            "lhw.status"=>1,
        ));
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $result= $query->result_array();
        } else {
           return FALSE;
        }
    }
    function get_distinct_all_fields($table,$field) 
    {
        $this->db->select("DISTINCT($field),phone_number,preg_week")->from($table)->order_by($field,"ASC");
        $query = $this->db->get();
        if ($query->num_rows() > 0)
            return $query->result_array();
        else
            return FALSE;
    }
    function get_all_fields_distinctwhere($table,$field,$where) 
    {
        $this->db->select("DISTINCT($field)")->from($table)->where($where)->order_by($field,"ASC");
        $query = $this->db->get();
        if ($query->num_rows() > 0)
            return $query->result_array();
        else
            return FALSE;
    }
    function getSpecificMaxResult($table,$where)
    {
        $this->db->select("Max(start_date_time) as start_date_time, campaign_name,msg,subjectId,name,preg_week,phone_number,attempts,first_audio_file,status,duration,system_week")
        ->from($table)->where($where);
        $query = $this->db->get();
        ;if ($query->num_rows() > 0)
        {
            $result= $query->result_array();
            return $result[0];
        }
        else
        {
            return FALSE;
        }
    }
    function getCalls($subId)
	{
        $query=$this->db->query("SELECT * FROM `call_record` WHERE `subjectId` = $subId and date_of_call=(select min(date_of_call) from call_record where subjectId=$subId and date_of_call != '0000-00-00') ORDER BY `date_of_call` ASC");
        
        if ($query->num_rows() > 0){
            $result= $query->result_array();
            return $result[0];
        }
        else{
            return FALSE;}
    }
     
}