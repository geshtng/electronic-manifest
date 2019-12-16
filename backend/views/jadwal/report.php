<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\ButtonDropdown;
use dosamigos\highcharts\HighCharts;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\JadwalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use fedemotta\datatables\DataTables;
use microinginer\dropDownActionColumn\DropDownActionColumn;

$this->title = 'Laporan Pelabuhan';

   foreach($dgrafik as $values){
      $a[0]= ($values['jenis_kelamin']);
      $c[]= ($values['jenis_kelamin']);
      $b[]= array('type'=> 'column', 'jenis_kelamin' =>$values['jenis_kelamin'], 'data' => array((int)$values['jml']));
   }
   
   echo "<div class='col-md-4' style='background-color : #fff'><h3>Data Kapal</h3>";
   $i = 0;
   foreach($jadwal as $schedule){
      $i++;
      echo $schedule->waktu."<br><h4>".$schedule->kapal->nama."</h4><br>";
   }
   echo "</div>";
   
   echo "<div class='col-md-8'>".
   Highcharts::widget([
      'clientOptions' => [
         'chart'=>[
            'type'=>'bar'
         ],
         'title' => ['text' => 'Data Penumpang'],
         'xAxis' => [
            'categories' => ['Penumpang']
         ],
         'yAxis' => [
            'title' => ['text' => 'Jumlah Penumpang']
         ],
         'series' => $b
      ]
   ])."</div>";
   


?>
</div>
