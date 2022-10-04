<?php
    function insertTable($data, $type, $pagination=true)
    {
        $root = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';

        if(str_contains($type, 'add')){
            $link = "dashboard/$type";
        }else{
            $link = $type;
        }

        $data_content = $data['datas'];
        $html = "<div class='table__box'>";
        $html .= "<h2 class='table__title' id='table-".$type."'>" . $type . "</h2>";
        $html .= "<table class='table__main'>";
        $html .= "<thead class='table__header'>";
        $html .= "<tr class='table__left'>";
        foreach ($data_content[0] as $key => $value) {
            if ($key != "id") {
                $html .= "<th class='table__head'>$key </th>";
            }
        }
        $html .= "</tr>
        </thead>
        <tbody>";
        foreach ($data_content as $item) {
            $html .= "<tr class='table__row table__left' onclick=\"window.location.href='/$link/$item->id'\">";
            foreach ($item as $key => $value) {
                if ($key != "id") {
                    $html.="<td class='table__content' > $value </td >";
                }
            }
            $html .= "</tr>";
        }
        $html .= "</tbody>
            </table>
        </div>";






         //pagination
        if($pagination && isset($data['rows'])){
                if($data['rows'][0]>10){
                $nbrPage = ceil($data['rows'][0]/10);

            $html .= '<nav id="pagination" >';
                 if ($data['page']>1){
            $html .=    '<span id="pagination--prev"><a href="'.$root.$link.'/'.($data['page']-1).'#table-'.$type.'"> Prev </a></span>';
                 }
                for ($i = 1; $i <= $nbrPage; $i++) {
                    if($i == $data['page']){$active = "page-active";}else($active = "");
            $html .= '<span id="page-'.$i.'" class="'.$active.'"><a href="'.$root.$link.'/'.$i.'#table-'.$type.'">'.$i.' </a></span>';
                 }
                if ($data['page']<$nbrPage){
                    $html .= '<span id="pagination--next"><a href="'.$root.$link.'/'.($data['page']+1).'#table-'.$type.'"> Next </a></span>';
                 }
                $html .= '</nav>';
             }
        }







        return $html;
    }
?>