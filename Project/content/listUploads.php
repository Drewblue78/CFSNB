<ul class="card-list">
    <?php

    define("UPLOAD_DIR", "uploads/");

    require 'db.php';

    $query = <<<JOINEDUPLOADS
  SELECT 
    session_user.username,
    upload_newjoke.title,
    upload_newjoke.stored_name,
    upload_newjoke.upload_on
  FROM upload_newjoke
  INNER JOIN session_user
    ON upload_newjoke.user_id=session_user.id
  ORDER BY upload_newjoke.upload_on DESC
  
  JOINEDUPLOADS;

    $stm = $con->prepare($query);

    $stm->execute();

    while ($row = $stm->fetch(PDO::FETCH_ASSOC)) {
        $uploadPath = UPLOAD_DIR . $row['stored_name'];
        echo <<<EACHPOST
    <li>
      <img src="$uploadPath" />
      <h3>{$row['title']}</h3>
      <div>
        {$row['username']}
        <span>{$row['uploaded_on']}</span>
      </div>
    </li>
    EACHPOST;
    }

    ?>
</ul>