
    <?php
    require 'db.php';
    class Jokes
    {
        static function listJokes()
        {
            echo '<ul class="card-list">';
            global $con;

            $query = <<<JOINEDPOSTS
            SELECT 
                session_user.username,
                session_jokes.content,
                session_jokes.punchline,
                session_jokes.posted_on
            FROM session_jokes
            INNER JOIN session_user
                ON session_jokes.user_id=session_user.id
            ORDER BY session_jokes.posted_on DESC
            JOINEDPOSTS;

            $stm = $con->prepare($query);

            $stm->execute();

            while ($row = $stm->fetch(PDO::FETCH_ASSOC)) {
                echo Jokes::jokeContent($row);
            }

            echo '</ul>';
        }
        static function randomJoke()
        {
            echo '<ul class="card-list">';
            global $con;

            $query = <<<JOINEDPOSTS
            
            SELECT 
                session_user.username,
                session_jokes.content,
                session_jokes.punchline,
                session_jokes.posted_on
            FROM session_jokes
            INNER JOIN session_user
                ON session_jokes.user_id=session_user.id
            WHERE session_jokes.id = ceil(rand()*(select max(id) FROM session_jokes))
            ORDER BY session_jokes.posted_on DESC
            JOINEDPOSTS;

            $foundJoke = false;
            while (!$foundJoke) {
                $stm = $con->prepare($query);

                $stm->execute();

                if ($row = $stm->fetch(PDO::FETCH_ASSOC)) {
                    $foundJoke = true;
                    echo Jokes::jokeContent($row);
                }
            }

            echo '</ul>';
        }
        static function jokeContent($row)
        {
            $date = new DateTime($row['posted_on']);
            $date = $date->format("D Y");
            return <<<EACHPOST
            <li>
            <div class="joke">
                <h3>{$row['content']}</h3>
                <h4>{$row['punchline']}</h4>
                <div>
                    {$row['username']}
                    <span>$date</span>
                </div>
            </div>
                <div class="vote-arrow">
                    <form>
                        <input >
                        <input type="hidden" name="jokeId" value="{$row['id']}" />

                        <button>&uarr;</button>
                    </form>
            </div>
            </li>
            EACHPOST;
        }
    }
