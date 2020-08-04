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

public function __construct($page, $records_per_page)
{
/** Constructor
 * @param integer $page  Page_number
 * @param integer $records_per_page Number of records per page
 * 
 * return void
 */
$this ->limit = $records_per_page;
$this-> offset = $records_per_page *($page -1);

}

}