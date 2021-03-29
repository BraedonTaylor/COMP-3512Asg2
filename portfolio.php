<?php
class Stock
{
    public $symbol;
    public $name;
    public $numShares;
    public $close;
    public $value;

    function __construct($s, $n, $ns, $c)
    {
        $this->symbol = $s;
        $this->name = $n;
        $this->numShares = $ns;
        $this->close = $c;
        $this->value = $ns * $c;
    }
}

function outputSingleStock($stock)
{
    echo '<img  class = "image" src="./logos/' . $stock->symbol . '.svg">';
    echo '<a class="stockSymbol" href="single-company.php?symbol=' . $stock->symbol . '">';
    echo $stock->symbol;
    echo '</a>';
    echo '<a class="stockName" href="single-company.php?symbol=' . $stock->symbol . '">';
    echo $stock->name;
    echo '</a>';
    echo '<p class="numShares">';
    echo number($stock->numShares);
    echo '</p>';
    echo '<p class="closeVal">$';
    echo currency($stock->close);
    echo '</p>';
    echo '<p class="shareValue">$';
    echo currency($stock->value);
    echo '</p>';
}

function totalPortfolio($portfolio)
{
    $total = 0;
    foreach ($portfolio as $s) {
        $total += $s->value;
    }
    $total = currency($total);
    echo "<p id='totalPort'> Value of my portfolio: $ $total </p>";
}

function buildheaders()
{
?>
    <div id="headerbox">
        <h2 class="headerBox" id="blank"> </h2>
        <h2 class="headerBox" id="symbolHeader">Symbol:</h2>
        <h2 class="headerBox" id="nameHeader">Name:</h2>
        <h2 class="headerBox" id="owned">Shares:</h2>
        <h2 class="headerBox" id="close">Closing:</h2>
        <h2 class="headerBox" id="worth">Value:</h2>
    </div>
<?php
}

function currency($dollar)
{
    return number_format($dollar, 2, ".", ",");
}

function number($qty)
{
    return number_format($qty);
}

$portfolio = [
    new Stock("AMZN", "Amazon.com Inc.", 25, 1760.19),
    new Stock("A", "Apple Inc.", 20, 218.32),
    new Stock("MSFT", "Microsoft Corporation", 1500, 108.82),
    new Stock("MMM", "3M Corporation", 1500, 108.82),
    new Stock("GOOGL", "Alphabet Inc.", 40, 1111.39)
];


// try {
//     $conn = DatabaseHelper::createConnection(array(
//         DBCONNSTRING,
//         DBUSER, DBPASS
//     ));
//     $artGateway = new PortfolioDB($conn);
//     $artists = $artGateway->getAll();
//     if (isset($_GET['id']) && $_GET['id'] > 0) {
//         $paintGateway = new PaintingDB($conn);
//         $paintings = $paintGateway->getAllForArtist($_GET['id']);
//     } else {
//         $paintings = null;
//     }
// } catch (Exception $e) {
//     die($e->getMessage());
// }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>COMP3512 Assignment 2</title>
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700,800" rel="stylesheet">
    <link rel="stylesheet" href="css/stylePort.css">

</head>

<body>
    <main class="container">
        <header id="header" class="box"><strong>COMP3512 Assignment 2 W2021</strong></header>
        <p id="spacer"></p>
        <div class="box">
            <p id="portHeader">My Portfolio</p>
            <?php buildHeaders();
            ?>
            <div id="stockView">
                <?php
                foreach ($portfolio as $p) {
                    outputSingleStock($p);
                }
                totalPortfolio($portfolio);
                ?>
            </div>
        </div>
    </main>
</body>

</html>