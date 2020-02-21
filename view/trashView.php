<?php if ($this->username) : ?>
    <li class="nav-item"><a href="index.php?action=showRegisterPage" class="nav-link"><?= 'Hi ' ?><?= $this->username ?></a></li>
<?php endif ?>

<li class="nav-item"><a href="index.php?action=showRegisterPage" class="nav-link"><?= 'Hi ' ?><?= htmlspecialchars($_SESSION["username"]) ?></a></li>

<a href="index.php?action=post&amp;id=<?= $data['id'] ?>"><?= htmlspecialchars($data['title']) ?></a>