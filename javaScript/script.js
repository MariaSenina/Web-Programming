function addNavBar() {
  const homeButtonStyle = `"background-image: url('../img/house.png'); background-size: contain; background-repeat: no-repeat;
  font-size: 16px; padding: 12px 20px 12px 60px;"`;

  document.write(`
    <div class="navbar">
      <a class="button" href="/" style=`+ homeButtonStyle + `>Home</a>
      <div class="dropdown">
        <a class="button">Products &#9660;</a>
        <div class="dropdown-content">
          <a href="../php/currency.php">Currency Converter</a>
          <a href="../html/tictactoe.html">Tic-Tac-Toe Game</a>
        </div>
      </div>
      <div class="dropdown">
        <a class="button" href="../html/contact.html">Contact Us &#9660;</a>
        <div class="dropdown-content">
          <a href="#">Contactez-nous<img src="../img/frenchflag.png" style="height: 20px; position: absolute; margin: 2px;"></a>
          <a href="#">Cont&aacute;ctenos<img src="../img/mexicanflag.png" style="height: 25px; position: absolute;"></a>
        </div>
      </div>
      <a class="button" href="../html/aboutme.html">About</a>
    </div>
`);
}

function greet() {
  const D = new Date();
  if ( ( (D.getHours() == 0 && D.getMinutes() > 0) || (D.getHours() > 0) ) &&
         (D.getHours() < 6 || (D.getHours() == 6 && D.getMinutes() == 0)) ) {
    document.write(`Good morning, you must be an early bird!`);
  } else if ( ( (D.getHours() == 6 && D.getMinutes() > 0) || (D.getHours() > 6) ) &&
                (D.getHours() < 12 || (D.getHours() == 12 && D.getMinutes() == 0) ) ) {
      document.write(`Good morning!`);
  } else if ( ( (D.getHours() == 12 && D.getMinutes() > 0) || (D.getHours() > 12) ) &&
                (D.getHours() < 18 || (D.getHours() == 18 && D.getMinutes() == 0) ) ) {
      document.write(`Good afternoon!`);
  } else {
    document.write(`Good evening!`);
  }
}
