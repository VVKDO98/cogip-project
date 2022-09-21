<?php
    function insertTable($data)
    {
        $html = "<div class='table__box'>";
        $html .= "<h2 class='table__title'>" . $data['name'] . "</h2>";
        $html .= "<table class='table__main'>";
        $html .= "<thead class='table__header'>";
        $html .= "<tr class='table__left'>";
        foreach ($data['datas'][0] as $key => $value) {
            if ($key != "id") {
                $html .= "<th class='table__head'>$key </th>";
            }
        }
        $html .= "</tr>
        </thead>
        <tbody>";
        foreach ($data['datas'] as $item) {
            $html .= "<tr class='table__row table__left' onclick=\"window.location.href='/company/$item->id'\">";
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
    }
?>

<div class="table__box">
    <h2 class="table__title">Last invoices</h2>
    <table class="table__main">
            <thead class='table__header'>
            <tr class="table__left">
                <th class="table__head">Invoice number</th>
                <th class="table__head">Dates due</th>
                <th class="table__head">Company</th>
                <th class="table__head">Created at</th>
            </tr>
        </thead>
        <tbody>
            <tr class='table__row table__left'>
                <td class='table__content'>F20220915-001</td>
                <td class="table__content">15/09/2022</td>
                <td class="table__content">Jouet Jean-Michel</td>
                <td class="table__content">25/09/2020</td>
            </tr>
            <tr class="table__row table__left">
                <td class="table__content">F20220915-002</td>
                <td class="table__content">15/09/2022</td>
                <td class="table__content">Dunder Mifflin</td>
                <td class="table__content">25/09/2020</td>
            </tr>
            <tr class="table__row table__left">
                <td class="table__content">F20220915-003</td>
                <td class="table__content">15/09/2022</td>
                <td class="table__content">Pierre Cailloux</td>
                <td class="table__content">25/09/2020</td>
            </tr>
            <tr class="table__row table__left">
                <td class="table__content">F20220915-004</td>
                <td class="table__content">15/09/2022</td>
                <td class="table__content">Pier Pipper</td>
                <td class="table__content">25/09/2020</td>
            </tr>
            <tr class="table__row table__left">
                <td class="table__content">F20220915-005</td>
                <td class="table__content">15/09/2022</td>
                <td class="table__content">Raviga</td>
                <td class="table__content">25/09/2020</td>
            </tr>
        </tbody>
    </table>
</div>