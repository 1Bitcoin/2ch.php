<?php

class Question
{
    public $text;
    public $points;
    public $answers;
    public $correctAnswer;
}

function createQuestions()
{
    $questions = [];

    $q1 = new Question;
    $q1->text = "Which planet is the fourth in a row from the sun?";
    $q1->points = 10;
    $q1->answers = array('a' => 'Venera', 'b' => 'Mars', 'c' => 'Jupiter', 'd' => 'Mercuriy');
    $q1->correctAnswer = 'b';

    $questions[] = $q1;

    $q2 = new Question;
    $q2->text = 'Which city is the capital of Great Britain?';
    $q2->points = 5;
    $q2->answers = array('a' => 'Paris', 'b' => 'Moscow', 'c' => 'New-York', 'd' => 'London');
    $q2->correctAnswer = 'd';

    $questions[] = $q2;

    $q3 = new Question;
    $q3->text = 'Who invented the theory of relativity?';
    $q3->points = 30;
    $q3->answers = array('a' => 'John Lennon', 'b' => 'Jim Morrison', 'c' => 'Albert Einstein', 'd' => 'Isaac Newton');
    $q3->correctAnswer = 'c';

    $questions[] = $q3;

    return $questions;
}

function printQuestions($questions)
{
    $number = 1; 

    foreach ($questions as $question)
    {
        echo "\n{$number}. {$question->text}\n\n";

        echo "Choose answer:\n";

        foreach ($question->answers as $letter => $answer)
            echo "  {$letter}. {$answer}\n";

        $number++;
    }

    return $number;
}

function chooseAnswers($countQuestions)
{
    $answers = [];

    for ($i = 1; $i < $countQuestions; $i++)
    {
        $choose = readline("Choose answer on {$i} question: ");
        echo "Your choose is {$choose}\n\n";

        $answers[] = $choose;
    }

    return $answers;
}

function checkAnswers($questions, $answers)
{
    if (count($questions) != count($answers))
        exit("The number of answers and questions does not match\n");

    $pointsTotal = 0;
    $pointsMax = 0;

    $correctAnswers = 0;
    $totalQuestions = count($questions);

    for ($i = 0; $i < count($questions); $i++)
    {
        $question = $questions[$i];
        $answer = $answers[$i];

        $pointsMax += $question->points;

        if ($answer == $question->correctAnswer)
        {
            $correctAnswers++;
            $pointsTotal += $question->points;
        }
        else
        {
            $number = $i + 1;
            echo "\nWrong answer to the question ¹{$number} ({$question->text})\n";
        }
    }

    echo "\nThe correct answers are: {$correctAnswers}/{$totalQuestions}, points scored: {$pointsTotal}/{$pointsMax}\n";
}

$questions = createQuestions();
$countQuestions = printQuestions($questions);

$answers = chooseAnswers($countQuestions);
checkAnswers($questions, $answers);

?>
