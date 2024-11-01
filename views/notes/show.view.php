<?php require base_path("views/partials/head.php") ?>
  <?php require base_path("views/partials/nav.php") ?>
  <?php require base_path("views/partials/banner.php") ?>
  <main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      <a href="/notes" class="text-blue-200 hover:text-blue-600">go back...</a>
      <p><?= htmlspecialchars($note["body"]) ?></p>
      
      <form action="" method="POST" class="mt-2">
        <input type="hidden" name="_method" id="" value="DELETE">
        <input type="hidden" placeholder="type num witch delete line" name="id" value="<?= $note["id"] ?>">
        <button href="" class="text-red-600">Delete</button>
      </form>
      <footer class="mt-3">
        <a href="/note/edit?id=<?= $note['id'] ?>" class="text-blue-800 border  px-4 py-2">edit</a>
      </footer>
    </div>
  </main>
<?php require base_path("views/partials/footer.php") ?>