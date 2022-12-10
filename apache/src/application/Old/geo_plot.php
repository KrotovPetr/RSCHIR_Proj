<?php // content="text/plain; charset=utf-8"
use Amenadiel\JpGraph\Graph;
use Amenadiel\JpGraph\Plot;

require_once 'data_parsing.php';

//DEFINE('WORLDMAP', 'C:\Users\Peter\PhpstormProjects\RSCHIR3\apache\src\admin\faker\images\worldmap1.png');


function markCallback($y, $x)
{
    if ($x == 54)
        return array(false, false, false, 'red', 0.8);
    else
        return array(false, false, false, 'green', 0.8);
}

function draw_geo_scatter()
{

    // Data arrays
        $datax = get_only_data(get_raw_data(),"longitude");//array(10, 20, 30, 40, 54, 60, 70, 80);
        $datay = get_only_data(get_raw_data(),"latitude");//array(12, 23, 65, 18, 84, 28, 86, 44);

    $__width = 400;
    $__height = 270;
    $graph = new Graph\Graph($__width, $__height, 'auto');
        $graph->img->SetMargin(1, 1, 1, 1);
        $graph->SetScale('linlin', -90, 90, -180, 180);
        $graph->xaxis->Hide();
        $graph->yaxis->Hide();
        $graph->title->Set("Pushpin graph");
        $graph->title->SetFont(FF_ARIAL, FS_BOLD, 16);
        $graph->title->SetColor('white');
        $graph->SetTitleBackground('darkgreen', TITLEBKG_STYLE1, TITLEBKG_FRAME_BEVEL);
        $graph->SetTitleBackgroundFillStyle(TITLEBKG_FILLSTYLE_HSTRIPED, 'blue', 'darkgreen');
        $sp = new Amenadiel\JpGraph\Plot\ScatterPlot($datay, $datax);
        $sp->mark->SetType(MARK_IMG_PUSHPIN, 'blue', 0.6);
        $sp->mark->SetCallbackYX('markCallback');
        $graph->Add($sp);
        $graph->Stroke('images/geo_plot.png');
}

?>