<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Sofa\Eloquence\Eloquence; // base trait
use Sofa\Eloquence\Mappable; // extension trait
use Sofa\Eloquence\Mutable; // extension trait

class OrderSlipDetail extends Model
{
    //
    use Eloquence, Mappable, Mutable;
    //
    protected $table 		= 'OrderSLipDetails';
    public $timestamps 		= false;

    //model mapping
    protected $maps = [ 
    	'branch_id' 			=> 'BRANCHID', 
    	'orderslip_detail_id' 	=> 'ORDERSLIPDETAILID', 
     	'orderslip_header_id' 	=> 'ORDERSLIPNO', 
    	'product_id' 			=> 'PRODUCT_ID', 
    	'part_number'			=> 'PARTNO', 
    	'product_group_id'		=> 'PRODUCTGROUP', 
    	'qty' 					=> 'QUANTITY', 
    	'srp' 					=> 'RETAILPRICE', 
		'amount' 				=> 'AMOUNT',
        'net_amount'            => 'NETAMOUNT',
		'remarks'				=> 'REMARKS',
		'order_type'			=> 'OSTYPE',  
		'status'				=> 'STATUS',
		'postmix_id' 			=> 'POSTMIXID',
		'is_modify'				=> 'IS_MODIFY',
        'line_number'           => 'LINE_NO',
        'old_comp_id'           => 'OLD_COMP_ID',
		'or_number' 			=> 'ORNO',
		'customer_id'			=> 'CUSTOMERCODE',
        'encoded_date'          => 'ENCODEDDATE', 
        'main_product_id'       => 'MAIN_PRODUCT_ID',
        'main_product_comp_id'  => 'MAIN_PRODUCT_COMPONENT_ID',
        'main_product_comp_qty' => 'MAIN_PRODUCT_COMPONENT_QTY'
    ];

    protected $getterMutators = [
        'part_number' => 'trim', 
    ];

    /**
     * Logic
     */
    public function getNewId(){
    	$result = static::where('branch_id', config('settings.branch_id'))
    				->orderBy('orderslip_detail_id','desc')
                    ->first();

        if( is_null($result)){
            return 1;
        }			
    	return $result->orderslip_detail_id + 1;
    }

    public function getOrderTypeValue($str, $bool = null){
        if($bool){
            return 2; // take out
        }else {
            return 1; // dine in
        }
    }

    public function getByOrderSlipHeaderId($id){
        return static::where('orderslip_header_id',$id)
            ->where('branch_id', config('settings.branch_id'))
            ->get();
    }
    
}
