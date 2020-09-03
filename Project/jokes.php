<!DOCTYPE html>
<html lang="en">

<head>
    <?php require "partials/head.php"; ?>
</head>

<body>
    <?php require "partials/navbar.php" ?>
    <h1>Random Joke Jenerator</h1>
    <?php

    if ($loggedIn) {
    }

    $bgcolor = '#FFFFCC';
    $textcolor = 'black';
    $textsize = '2';


    $allqts = array(
        "What did the Buddhist ask the hot dog vendor?",
        "Make me one with everything.",

        "You know why you never see elephants hiding up in trees?",
        "Because they’re really good at it.",

        "What is red and smells like blue paint?",
        "Red paint.",

        "A dyslexic man walks into a bra.",
        "",

        "Where does the General keep his armies?",
        "In his sleevies!",

        "Why aren’t koalas actual bears?",
        "The don’t meet the koalafications.",

        "A bear walks into a restaurant and say’s “I want a grilllllled………………………………………cheese.” The waiter says “Whats with the pause?”",
        "The bear replies “Whaddya mean, I’M A BEAR.”",

        "What do you call bears with no ears?",
        "B",

        "Why dont blind people skydive?",
        "Because it scares the crap out of their dogs.",

        "I went in to a pet shop. I said, “Can I buy a goldfish?” The guy said, “Do you want an aquarium?”",
        "I said, “I don’t care what star sign it is.”",

        "What do you get when you cross a dyslexic, an insomniac, and an agnostic?",
        "Someone who lays awake at night wondering if there is a dog.",

        "A pirate walks into a bar with a steering wheel on his pants, a peg leg and a parrot on his shoulder. The bartender says, “Hey, you’ve got a steering wheel on your pants.”",
        "The pirate says, “Arrrr, I know. It’s driving me nuts.”",

        "I saw a wino eating grapes.",
        "I told him, you gotta wait. (Mitch Hedberg)",

        "What’s brown and sticky?",
        "A stick.",

        "What does a pepper do when it’s angry?",
        "It gets jalapeño face!",

        "What’s a foot long and slippery?",
        "A slipper.",

        "Two gold fish are in a tank.",
        "One looks at the other and says, “You know how to drive this thing?!”",

        "Two soldiers are in a tank.",
        "One looks at the other and says, “BLUBLUBBLUBLUBBLUB.”",

        "As a scarecrow, people say I’m outstanding in my field.",
        "But hay, it’s in my jeans.",

        "A man is walking in the desert with his horse and his dog when the dog says, “I can’t do this. I need water.” The man says, “I didn’t know dogs could talk.”",
        "The horse says, “Me neither!”"
    );

    // Gets the Total number of Items in the array
    //  Divides by 2 because there is a question and answer
    $totalqts = (count($allqts) / 2);

    // Subtracted 1 from the total because '0' is not accounted for otherwise
    $nmbr = (rand(0, ($totalqts - 1)));
    $nmbr = $nmbr * 2;

    //$nmbr = 18;

    $quote = $allqts[$nmbr];
    $nmbr = $nmbr + 1;
    $author = $allqts[$nmbr];

    $space = "<font color=$bgcolor>.....................................<br></font>";
    $comments = "<br><center><font size='-2'><i><a href='jokes.php'>";

    echo "<center>";
    echo "<Font color=$textcolor size='$textsize'><i>";
    echo "$quote<br>";
    echo "</i></font>";
    echo "$space $author";
    echo "$comments";
    echo "</center>";


    if ($_SERVER['PHP_SELF'] == "/jokes.php") {
        show_source("jokes.php");
    }

    ?>
    <br><br><br>

    <input type="button" onclick="window.location='jokes.php'" class="Redirect" value="New Joke" />

</body>

</html>