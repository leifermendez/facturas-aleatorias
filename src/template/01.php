<style>
    .clearfix:after {
        content: "";
        display: table;
        clear: both;
    }

    a {
        color: #5D6975;
        text-decoration: underline;
    }

    body {
        position: relative;
        color: #7c8c9a;
        background: #FFFFFF;
        font-family: "Lucida Console", Monaco, monospace;
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

    h1 {
        border-top: 0px solid #5D6975;
        border-bottom: 1px dotted #abc0d4;
        color: #7c8c9a;
        font-size: 2.2em;
        line-height: 1.4em;
        font-weight: normal;
        text-align: left;
        margin: 0 0 55px 0;
        background: url(dimension.png);
    }

    #project {
        float: left;
    }

    #project span {
        color: #5D6975;
        text-align: left;
        width: 52px;
        margin-right: 25px;
        display: inline-block;
        font-size: 0.8em;
    }

    #company {
        float: right;

    }

    #project div,
    #company div {
        white-space: nowrap;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 20px;
    }

    table tr:nth-child(2n-1) td {
        background: #F5F5F5;
    }

    table th,
    table td {
        text-align: center;
    }

    table th {
        padding: 5px 20px;
        color: #5D6975;
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
        border-top: 1px solid #5D6975;;
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
    <h1><?php echo $data['company_header'] ?> <span style="font-size: 12px"><?php echo $data['company_rif'] ?></span>
    </h1>
    <div id="company" class="clearfix">
        <div><b>Factuara Nº</b>: <?php echo $data['company_number_invoice'] ?></div>
        <div><?php echo $data['company_number_invoice'] ?></div>
        <div><?php echo $data['company_address'] ?></div>
        <div><?php echo $data['company_phone'] ?></div>
    </div>
    <div id="project">
        <div><span>Razon Social:</span> <?php echo $data['customer_name'] ?></div>
        <div><span>RIF:</span> <?php echo $data['customer_rif'] ?></div>
        <div><span>Dirección:</span>  <?php echo $data['customer_address'] ?></div>
        <div><span>Email:</span> <a href="mailto:john@example.com"> <?php echo $data['customer_email'] ?></a></div>
        <div><span>Fecha</span>  <?php echo $data['customer_date'] ?></div>
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
        <tr>
            <td class="desc">Creating a recognizable design solution based on the company's existing visual identity
            </td>
            <td class="unit">$40.00</td>
            <td class="qty">26</td>
            <td class="total">$1,040.00</td>
        </tr>
        <tr>
            <td colspan="3">SUBTOTAL</td>
            <td class="total">$5,200.00</td>
        </tr>
        <tr>
            <td colspan="3">TAX 12%</td>
            <td class="total">$1,300.00</td>
        </tr>
        <tr>
            <td colspan="3" class="grand total">GRAND TOTAL</td>
            <td class="grand total">$6,500.00</td>
        </tr>
        </tbody>
    </table>
</div>