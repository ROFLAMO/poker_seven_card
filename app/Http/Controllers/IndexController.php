<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Enter your code here, enjoy!
        global $off_box_a,$off_box_b,$off_box_c,$off_box_d;
        global $a,$b,$c,$d;


        $list_box=array();
        $off_box_a=array();
        $off_box_b=array();
        $off_box_c=array();
        $off_box_d=array();



        echo "<h1>Hello, PHP!</h1><br>";
          for($i=0;$i<52;$i++){
          $poke[$i]=$i;
          //echo $poke[$i];
          }
          //shuffle($poke);//把陣列弄亂，但後來發現不太需要這個

          echo "<br>a:<br>";
          $a=array_rand($poke,13);//陣列中亂數取13
          foreach($a as $value =>$list1){
          $pokeer_echo=self::poke_pr($list1,$list_box);
          echo ",";
          //echo $list1.",";
          unset($poke[$list1]);
          }

          //$poke=array_values($poke);//重新排陣列

          echo "<br>b:<br>";
          $b=array_rand($poke,13);//陣列中亂數取13
          //$b=$poke;
          foreach($b as $value =>$list2){
          $pokeer_echo=self::poke_pr($list2,$list_box);
          echo ",";
          //echo $list2.",";
          unset($poke[$list2]);
          }

          echo "<br>c:<br>";
          $c=array_rand($poke,13);//陣列中亂數取13
          //$b=$poke;
          foreach($c as $value =>$list3){
          $pokeer_echo=self::poke_pr($list3,$list_box);
          echo ",";
          //echo $list3.",";
          unset($poke[$list3]);
          }

          echo "<br>d:<br>";
          $d=array_rand($poke,13);//陣列中亂數取13
          //$b=$poke;
          foreach($d as $value =>$list4){
          $pokeer_echo=self::poke_pr($list4,$list_box);
          echo ",";
          // echo $list4.",";
          unset($poke[$list4]);
          }

          //出牌
          $array_sort=array("a","b","c","d");
          for($j=0;$j<13;$j++){
            for($i=0;$i<4;$i++){
              //echo $array_sort($i);
              $poke_output=self::poke_output(${$array_sort[$i]},$list_box,${"off_box_".$array_sort[$i]});//$a,$list_box,$off_box_a

              echo "<br>*********<br>".$array_sort[$i].":";
              echo "<br>*********<br>目前牌組:";
              foreach($poke_output[0] as $value =>$list){
              $pokeer_echo=self::poke_pr($list,$list_box);
              echo ",";
              }
              echo "<br>*********<br>桌上的牌:";
              foreach($poke_output[1] as $value =>$list){
              $pokeer_echo=self::poke_pr($list,$list_box);
              echo ",";
              }
              echo "<br>*********<br>蓋牌:";
              foreach($poke_output[2] as $value =>$list){
              $pokeer_echo=self::poke_pr($list,$list_box);
              echo ",";
              }
              
              /*
              echo "<br>*********<br>目前牌組:";
              $result=print_r($poke_output[0], true);
              echo $result;
              echo "<br>*********<br>桌上的牌:";
              $result=print_r($poke_output[1], true);
              echo $result;
              echo "<br>*********<br>蓋牌:";
              $result=print_r($poke_output[2], true);
              echo $result;
              */

              ${$array_sort[$i]}=$poke_output[0];
              $list_box=$poke_output[1];
              ${"off_box_".$array_sort[$i]}=$poke_output[2];
              
              echo "<br>******************************************************************************<br>";


            }
          }
          ////註解的這段是還未轉換成1~13的，這跟正確的計算法有差
          //$suma=array_sum($off_box_a);
          //$sumb=array_sum($off_box_b);
          //$sumc=array_sum($off_box_c);
          //$sumd=array_sum($off_box_d);

          $sum_arrayaaa=self::poke_pr_off($off_box_a);
          //echo "<P>";
          //print_r($off_box_a);
          //print_r($sum_arrayaaa);
          $suma1=array_sum($sum_arrayaaa);
          $sum_arraybbb=self::poke_pr_off($off_box_b);
          //echo "<P>";
          //print_r($off_box_b);
          //print_r($sum_arraybbb);
          $sumb1=array_sum($sum_arraybbb);
          $sum_arrayccc=self::poke_pr_off($off_box_c);
          //echo "<P>";
          //print_r($off_box_c);
          //print_r($sum_arrayccc);
          $sumc1=array_sum($sum_arrayccc);
          $sum_arrayddd=self::poke_pr_off($off_box_d);
          //echo "<P>";
          //print_r($off_box_d);
          //print_r($sum_arrayddd);
          //echo "<P>";
          $sumd1=array_sum($sum_arrayddd); 

          //註解的這段是還未轉換成1~13的，這跟正確的計算法有差
          /*
          $sum_array=array("a"=>$suma,"b"=>$sumb,"c"=>$sumc,"d"=>$sumd);
          //sort($sum_array);
          //echo "<br>a:".$suma."<br>b:".$sumb."<br>c:".$sumc."<br>d:".$sumd;
          $ss=1;
          asort($sum_array);
          //print_r($sum_array);
          echo "<P>";
          foreach($sum_array as $sumkey=>$sum_num){
            echo "排名&nbsp;".$ss.":&nbsp;".$sumkey."&nbsp;&nbsp;總蓋牌點:&nbsp;".$sum_num."<br>";
            $ss++;
          }
          */
          echo "<P>";
          $sum_array=array("a"=>$suma1,"b"=>$sumb1,"c"=>$sumc1,"d"=>$sumd1);
          //sort($sum_array);
          //echo "<br>a:".$suma."<br>b:".$sumb."<br>c:".$sumc."<br>d:".$sumd;
          $ss=1;
          asort($sum_array);
          //print_r($sum_array);
          
          foreach($sum_array as $sumkey=>$sum_num){
            echo "排名&nbsp;".$ss.":&nbsp;".$sumkey."&nbsp;&nbsp;總蓋牌點:&nbsp;".$sum_num."<br>";
            $ss++;
          }




    }

    //*************輸出手牌&花色
    public function poke_pr($list,$list_box){
          $color=(int)($list/13);
          $num=$list%13+1;
          //echo $color."-".$num;
          switch ($color){
          case 0:
          echo "黑桃".$num;
          break;
          case 1:
          echo "愛心".$num;
          break;
          case 2:
          echo "菱形".$num;
          break;
          case 3:
          echo "梅花".$num;
          break;
          }
         
    }

    //*****************將蓋牌的array轉換成點數
    public function poke_pr_off($list){

        foreach($list as $newlist){

          $num[]=$newlist%13+1;
        }
        return $num;
         
    }





    




    //*******出牌 $list 手牌  $list_box桌上的牌  off_box 蓋牌
    public function poke_output($list,$list_box,$off_box){

        if(empty($list_box)){
            //echo"<BR>空陣列<BR>";

            $result=print_r($list, true);

            echo "<BR>手牌:".$result;

            $has_seven=0;//用來計算牌組內是否有7，6,19,32,45都是7

            foreach($list as $list_number){
                switch ($list_number){
                    
                    case 6:
                    echo "have 6";
                    $has_seven++;
                    $key = array_search('6', $list); // 陣列中搜索給定的值，如果成功則返回相應的key
                    array_unshift($list_box,$list[$key]); //新增array，到牌桌
                    unset($list[$key]);
                    break 2;
                    
                    case 19:
                    echo "have 19";
                    $has_seven++;
                    $key = array_search('19', $list); // 陣列中搜索給定的值，如果成功則返回相應的key
                    array_unshift($list_box,$list[$key]); //新增array，到牌桌
                    unset($list[$key]);

                    break 2;
                    
                    case 32:
                    echo "have 32";
                    $has_seven++;
                    $key = array_search('32', $list); // 陣列中搜索給定的值，如果成功則返回相應的key
                    array_unshift($list_box,$list[$key]); //新增array，到牌桌
                    unset($list[$key]);

                    break 2;
                    
                    case 45:
                    echo "have 45";
                    $has_seven++;
                    $key = array_search('45', $list); // 陣列中搜索給定的值，如果成功則返回相應的key
                    array_unshift($list_box,$list[$key]); //新增array，到牌桌
                    unset($list[$key]);

                    break 2;
                    default:
                    //蓋牌不是在這裡

                    break;


                }
            }

            if($has_seven<1){
                //蓋牌
                $off_card=array_rand($list,1); //這裡亂數取出的會是Key而非value

                array_unshift($off_box,$list[$off_card]); //新增array，到蓋牌的手上
                
                echo "<br>off_card:".$list[$off_card];
                unset($list[$off_card]); //從手牌上刪除
                $result=print_r($list, true);
                echo "<br>修改後1:".$result;
                //global $off_box_a;
                //$off_box_a=$off_box;
                //global $a;
                //$a=$list;

            }
            //$poke_output_re=array($list,$list_box,$off_box);
            //return $poke_output_re;


        
        }
        else
        {
            //echo"非空陣列"."<BR>";
            //*******出牌 $list 手牌  $list_box桌上的牌  off_box 蓋牌
            foreach($list_box as $list_box_card)
            {
                $list_box_card_max=$list_box_card+1;
                $list_box_card_min=$list_box_card-1;
                $k=0;
                //$key = array_search($list_box_card_max, $list);
                if(array_search($list_box_card_max, $list,true)){
                    //echo "<br>****<br>".$list_box_card_max;
                    $key = array_search($list_box_card_max, $list); // 陣列中搜索給定的值，如果成功則返回相應的key
                    array_unshift($list_box,$list[$key]); //新增array，到牌桌
                    unset($list[$key]);
                    $k++;
                    break ;
                }
                if(array_search($list_box_card_min, $list,true))
                {
                    //echo "<br>****<br>".$list_box_card_min;
                    $key = array_search($list_box_card_min, $list); // 陣列中搜索給定的值，如果成功則返回相應的key
                    array_unshift($list_box,$list[$key]); //新增array，到牌桌
                    unset($list[$key]);
                    $k++;
                    break;
                }

                foreach($list as $list_number){
                    switch ($list_number){
                        
                        case 6:
                        echo "have 6";
                        $k++;
                        $key = array_search('6', $list); // 陣列中搜索給定的值，如果成功則返回相應的key
                        array_unshift($list_box,$list[$key]); //新增array，到牌桌
                        unset($list[$key]);
                        break 3;
                        
                        case 19:
                        echo "have 19";
                        $k++;
                        $key = array_search('19', $list); // 陣列中搜索給定的值，如果成功則返回相應的key
                        array_unshift($list_box,$list[$key]); //新增array，到牌桌
                        unset($list[$key]);

                        break 3;
                        
                        case 32:
                        echo "have 32";
                        $k++;
                        $key = array_search('32', $list); // 陣列中搜索給定的值，如果成功則返回相應的key
                        array_unshift($list_box,$list[$key]); //新增array，到牌桌
                        unset($list[$key]);

                        break 3;
                        
                        case 45:
                        echo "have 45";
                        $k++;
                        $key = array_search('45', $list); // 陣列中搜索給定的值，如果成功則返回相應的key
                        array_unshift($list_box,$list[$key]); //新增array，到牌桌
                        unset($list[$key]);

                        break 3;

                    }
                }


                if($k<1) //如果都沒有，$k會小於1 所以就蓋牌
                {
                    $off_card=array_rand($list,1); //這裡亂數取出的會是Key而非value

                    array_unshift($off_box,$list[$off_card]); //新增array，到蓋牌的手上
                    
                    echo "<br>off_card:".$list[$off_card];
                    unset($list[$off_card]); //從手牌上刪除
                    $result=print_r($list, true);
                    echo "<br>修改後2:".$result;
                    break;

                }

            }
        }
            $poke_output_re=array($list,$list_box,$off_box);
            return $poke_output_re;


        }



    

    //蓋牌
    /*
    public function poke_off($list,$list_box,$off_box){

                $off_card=array_rand($list,1); //這裡亂數取出的會是Key而非value

                array_unshift($off_box,$list[$off_card]); //新增array，到蓋牌的手上
                
                echo "<br>off_card:".$list[$off_card];
                unset($list[$off_card]); //從手牌上刪除
                $result=print_r($list, true);
                echo "<br>list:".$result;
                //global $off_box_a;
                //$off_box_a=$off_box;
                //global $a;
                //$a=$list;
                return 0;
    }*/





    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
