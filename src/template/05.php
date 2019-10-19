<style>
    @import url('https://fonts.googleapis.com/css?family=Source+Sans+Pro&display=swap');

    @page {
        margin: 0px 0px 0px 0px !important;
        padding: 0px 0px 0px 0px !important;
    }

    .clearfix:after {
        content: "";
        display: table;
        clear: both;
    }

    a {
        color: #5D6975;
        text-decoration: underline;
    }

    .logo-circle {
        background-color: #92bfe8;
        width: 5em !important;
        height: 5em !important;
        color: white;
        line-height: 2em !important;
        border: solid 1px white !important;
    }

    body {
        margin: 0;
        position: relative;
        color: #2d3031 !important;
        background: #FFFFFF;
        font-family: 'Source Sans Pro', sans-serif;
        font-size: 12px;
    }

    header {
        padding: 10px 0;
        margin-bottom: 30px;
    }

    #logo {
        text-align: center;
        margin-bottom: 10px;
    }

    #logo img {
        width: 90px;
    }

    .header {
        border-top: 0px solid #5D6975;
        border-bottom: 0px dotted #abc0d4;
        font-size: 1.3em;
        font-weight: normal;
        text-align: center;
        margin: 0 0 20px 0;
        background-color: #d8eeff;
        padding: 2rem;
    }

    #project {
        float: left;
        margin-left: 20px;
    }

    #project span {
        text-align: left;
        width: 52px;
        margin-right: 25px;
        display: inline-block;
        font-size: 0.8em;
    }

    #company {
        float: right;
        margin-right: 20px;

    }

    #project div,
    #company div {
        white-space: nowrap;
    }

    #project div, #company div {
        border-bottom: solid 1px #f2f3f5;
        padding: 5px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 20px;
    }

    table tr:nth-child(2n-1) td {
        background: #f5fbff;
    }

    table th,
    table td {
        text-align: center;
    }

    table th {
        padding: 5px 20px;
        border-bottom: 1px solid #C1CED9;
        white-space: nowrap;
        font-weight: normal;
    }

    table .service,
    table .desc {
        text-align: left;
    }

    table td {
        padding: 20px;
        text-align: right;
    }

    table td.service,
    table td.desc {
        vertical-align: top;
    }

    table td.unit,
    table td.qty,
    table td.total {
        font-size: 1.2em;
    }

    table td.grand {
        border-top: 0px solid #5D6975;;
    }

    #notices .notice {
        color: #5D6975;
        font-size: 1.2em;
    }

    footer {
        color: #5D6975;
        width: 100%;
        height: 30px;
        position: absolute;
        bottom: 0;
        border-top: 1px solid #C1CED9;
        padding: 8px 0;
        text-align: center;
    }
</style>
<div class="clearfix">
    <div class="header">
        <span><?php echo $data['vendor']['company_name'] ?></span>
        <span> <br><?php echo $data['vendor']['company_rif'] ?></span>
    </div>

    <div id="company" class="clearfix">
        <div><b>Factuara Nº</b>: <?php echo $data['vendor']['invoice_number'] ?></div>
        <div><?php echo $data['vendor']['company_rif'] ?></div>
        <div><?php echo $data['vendor']['company_address'] ?></div>
        <div><?php echo $data['vendor']['company_phone'] ?></div>
    </div>
    <div id="project">
        <div><span>Razon Social:</span> <?php echo $data['customer']['customer_name'] ?></div>
        <div><span>RIF:</span> <?php echo $data['customer']['customer_rif'] ?></div>
        <div><span>Dirección:</span> <?php echo $data['customer']['customer_address'] ?></div>
        <div><span>Email:</span> <a href="mailto:john@example.com"><?php echo $data['customer']['customer_email'] ?></a>
        </div>
        <div><span>Fecha</span> <?php echo $data['vendor']['date'] ?></div>
    </div>
</div>
<div style="
    margin-top: 30px;
">
    <table>
        <thead>
        <tr>
            <th class="desc">Descripción</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Total</th>
        </tr>
        </thead>
        <tbody>
        <?php $_total = 0 ?>
        <?php foreach ($data['item'] as $k) { ?>
            <tr>
                <td class="desc"><?php echo $k['title'] ?>
                </td>
                <td class="unit"><?php echo $k['price'] ?></td>
                <td class="qty"><?php echo $k['qty'] ?></td>
                <td class="total"><?php echo $k['price_total'] ?></td>
            </tr>
            <?php
            $_tmp = str_replace(',', '', $k['price_total']);
            $_total += floatval($_tmp)
            ?>
        <?php } ?>

        <tr>
            <td colspan="3">Sub-Total</td>
            <td class="total"><?php echo number_format($_total, 2, '.', ','); ?></td>
        </tr>
        <tr>
            <td colspan="3">TAX 12%</td>
            <td class="total"><?php echo $this->invoice_tax ?></td>
        </tr>
        <tr>
            <td colspan="3" class="grand total">TOTAL</td>
            <td class="grand total"><?php echo number_format($_total, 2, '.', ','); ?></td>
        </tr>
        </tbody>
    </table>
</div>