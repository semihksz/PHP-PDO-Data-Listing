<?php
//we include the config file.
require_once 'config.php';

//The variable of the PDO connection in the config file is written. 
//Prepare: An SQL statement template is created and sent to the database. We select the data in the table in the database by saying Select * from #tablename.
//Then we pass it to a variable.
$data = $db->prepare("SELECT * FROM datainsert");

//We run the variable we created.
$data->execute();

//we have listed the data with query. 
//However, if we do this and leave, we will receive a  warning that you asked for the data from me but did not bring it.
//we brought all the data with fetchAll to fix this error.
//however, this time he listed both his own indexes and the indexes we created for us, and to prevent this, we are writing fetchAll(PDO::FETCH_ASSOC), so only the indexes we created are listed.
$datainsert = $data->fetchAll(PDO::FETCH_ASSOC);

?>

<!-- We are creating a simple bootstrap table. -->
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Data Listing</title>
</head>

<body>
    <div class="container">
        <div class="card mt-5 p-5">
            <table class="table">
                <thead>
                    <!-- We will write the table headings -->
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Username</th>
                        <th scope="col">Usermail</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- We will create a foreach loop within php tags. 
                         We transfer the added data variable to the data variable to be listed.
                         the reason we use the foreach loop is to list all the data in the database.-->
                    <?php foreach ($datainsert as $key => $datalisting) { ?>
                        <tr>
                            <!-- we write the data we want to list into the variable we transfer. -->
                            <th scope="row"><?php echo $datalisting['user_id'] ?></th>
                            <td><?php echo $datalisting['user_name'] ?></td>
                            <td><?php echo $datalisting['user_mail'] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
