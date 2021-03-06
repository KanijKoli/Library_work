<?php include "./inc/header.php" ?>
<?php
  include "../classes/thisisClass.php";
  $bk = new ThisisClasses();
  $dataList = $bk->getThisis();

  if ($_SERVER['REQUEST_METHOD']=="GET" && isset($_GET['delete'])) {

    if ($_GET['delete']!=null) {
        $bk->deleteThisisIntoDB($_GET['delete']);
    } else {
        echo "<script>window.location.href = '404.php';</script>";
    }
  }
?>
<div class="dashboadheader" id="maindash">
    <div class="dashnav">
      <label for="nav-toggle">
        <span class="fas fa-bars"></span>
      </label>
      Thesis List
    </div>
    <a class="nav-link" href="index.php"><i class="fas fa-home"></i> Home</a>
  </div>


      <main>
      <?php include "./inc/searchform.php" ?>

          <div class="table-responsive scroll">
            <table width="100%">
            <thead>
              <tr>
                <th scope="col">Cover</th>
                <th scope="col">Title</th>
                <th scope="col">Author</th>
                <th scope="col">Action</th>
  
              </tr>
            </thead>
            <tbody>
            <?php
                if (isset($dataList) && $dataList!=false) {
                  while ($book = $dataList->fetch_assoc()) {
              ?>
              <tr>
                <td data-label="Cover"><img src="<?php echo $book['image']; ?>" alt="<?php echo $book['title']; ?>"></td>
                <td data-label="Title"><a href="thesisdes.php?id=<?php echo $book['id']; ?>"><?php echo $book['title']; ?></a></td>
                <td data-label="Author"><?php echo $book['author']; ?></td>
                <td>
                    <a class="btn btnsave" href="editthisis.php?id=<?php echo $book['id']; ?>"><i class="fas fa-edit"></i></a>
                    <a class="btn btncancel" href="?delete=<?php echo $book['id']; ?>"><i class="fas fa-trash-alt"></i></a>
                </td>
              </tr>
              <?php
                  }
                }else{
                  echo "<h3>Nothing to Show</h3>";
                }
              ?>

            </tbody>
  
          </table>
          </div> 

      </main>
      <?php include "./inc/footer.php" ?>