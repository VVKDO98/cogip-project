<?php
    function insertTable($data, $type, $pagination=true)
    {
        $root = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';

//        if(str_contains($type, 'add')){
//            $link = "dashboard/$type";
//        }else{
//            $link = $type;
//        }
        switch ($type){
            case "All contacts": $link = "contact";$title = $type;break;
            case "All invoices": $link = "invoice";$title = $type; break;
            case "All companies": $link = "company";$title = $type; break;
            case str_contains($type, 'add'): $dashboard=true;$link = "dashboard/$type";$title = str_replace('add', '', $type); break;
            default : $link = $type; $title = $type; break;
        }
        $data_content = $data['datas'];
        $html = "<div class='table__box'>";
        $html .= "<h2 class='table__title' id='table-".str_replace(' ', '', $type)."'>" . $title . "</h2>";
        $html .= "<table class='table__main'>";
        $html .= "<thead class='table__header'>";
        $html .= "<tr class='table__left'>";
        foreach ($data_content[0] as $key => $value) {
            if ($key != "id") {
                $html .= "<th class='table__head'>$key </th>";
            }
        }
        if (isset($dashboard)) {
            $html .= "<th></th>";
        }
        $html .= "</tr>
        </thead>
        <tbody>";
        foreach ($data_content as $item) {
            if (isset($dashboard)){
                $onclick="/dashboard/details/$type/$item->id";
            }else{
                $onclick="/$link/$item->id";
            }
            $html .= "<tr class='table__row table__left' onclick=\"window.location.href='$onclick'\">";
            foreach ($item as $key => $value) {
                if ($key != "id") {
                    $html.="<td class='table__content' > $value </td >";
                }
            }
            if(isset($dashboard)){
                $html .= "<td class='table__content' > <form method='post' action='/del/$title' ><input type='hidden' name='id' value='$item->id'><button type='submit' class='deletebutton'><img src='../../assets/img/remove.png'></button></form></td>";
            }
            $html .= "</tr>";
        }
        $html .= "</tbody>
            </table>
        </div>";






         //pagination
        if($pagination && isset($data['rows'])){

            switch ($type) {
                case "All contacts":
                    $link = "contacts";
                    break;
                case "All invoices":
                    $link = "invoices";
                    break;
                case "All companies":
                    $link = "companies";
                    break;
            }

            if($data['rows'][0]>10){
                $nbrPage = ceil($data['rows'][0]/10);

                $html .= '<nav id="pagination" >';

                $classprev = $data['page']>1?"":"inactive";
                $prevlink = $data['page']>1? 'href='.$root.$link.'/'.($data['page']-1).'#table-'.str_replace(' ', '', $type):"";
                $html .=    '<a id="pagination--prev" class="'.$classprev.'" '.$prevlink.'> < </a>';

                for ($i = 1; $i <= $nbrPage; $i++) {
                    if($i == $data['page']){$active = "page-active";}else($active = "");
                    $html .= '<a id="page-'.$i.'" class="'.$active.'" href="'.$root.$link.'/'.$i.'#table-'.str_replace(' ', '', $type).'">'.$i.' </a>';
                 }

                $classnext = $data['page']<$nbrPage? "": "inactive";
                $nextlink = $data['page']<$nbrPage? 'href='.$root.$link.'/'.($data['page']+1).'#table-'.str_replace(' ', '', $type):"";

                $html .= '<a id="pagination--next" class="'.$classnext.'" '.$nextlink.'> > </a>';
                $html .= '</nav>';
             }
        }







        return $html;
    }
?>