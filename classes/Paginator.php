<?php
/**
 * Paginator
 * Data for selection a page of records
 */
class Paginator{
    /**Number of records to return
     * @var integer
     */
public $limit;
/**Number of records to skip before the page
 * @var integer
 */
public $offset;

public $previous;
public $next;

public function __construct($page, $records_per_page, $total_records)
{
/** Constructor
 * @param integer $page  Page_number
 * @param integer $records_per_page Number of records per page
 * 
 * return void
 */
$this ->limit = $records_per_page;
//var_dump($page);
$page = filter_var($page, FILTER_VALIDATE_INT,[
    'options' => [
        'default' => 1,
        'min_range' => 1
    ]
]);
if ($page >1){
  $this->previous = $page -1;  
}

$total_pages = ceil($total_records / $records_per_page);
if ($page < $total_pages){
  $this -> next = $page + 1;  
}


$this-> offset = $records_per_page * ($page -1);

}

}