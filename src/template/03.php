<style>
    @import url('https://fonts.googleapis.com/css?family=Questrial&display=swap');
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
        color: #222222 !important;
        background: #FFFFFF;
        letter-spacing: 1px;
        font-family: 'Questrial', sans-serif;
        font-size: 13px;
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
        border-bottom: 0px dotted #abc0d4;
        font-size: 1.9em;
        line-height: 1em;
        font-weight: bold;
        text-align: center;
        margin: 0 0 55px 0;
        background-color: #f4f9c5;
        padding: 1.4rem;
    }

    #project {
        float: right;
    }

    #project span {
        text-align: left;
        width: 52px;
        margin-right: 25px;
        display: inline-block;
        font-size: 0.8em;
    }

    #company {
        float: left;

    }

    #project div,
    #company div {
        white-space: nowrap;
    }

    #project div, #company div {
        border-bottom: solid 3px #ffffff;
        padding: 5px;
        background-color: #f4f9c5;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 20px;
    }

    table tr:nth-child(2n-1) td {
        background: #f4f9c5;
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
    <h1>TECNI-SERVICIOS LEIFER <span style="font-size: 12px">V-20625405-6</span></h1>
    <div id="company" class="clearfix">
        <div><b>Factuara Nº</b>: 0000001</div>
        <div>Tecniservicios Leifer</div>
        <div>Tachira, San Cristobal<br/> Barrio Obrero Calle 22 2-A</div>
        <div>(602) 519-0450</div>
    </div>
    <div id="project">
        <div><span>Razon Social:</span> John Doe</div>
        <div><span>RIF:</span> John Doe</div>
        <div><span>Dirección:</span> 796 Silver Harbour, TX 79273, US</div>
        <div><span>Email:</span> <a href="mailto:john@example.com">john@example.com</a></div>
        <div><span>Fecha</span> August 17, 2015</div>
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