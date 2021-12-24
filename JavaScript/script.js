function addNavBar() {
  const homeButtonStyle = `"background-image: url('../CSS/house.png'); background-size: contain; background-repeat: no-repeat;
  font-size: 16px; padding: 12px 20px 12px 60px;"`;

  document.write(`
    <div class="navbar">
      <a class="button" href="../php/index.php" style=`+ homeButtonStyle + `>Home</a>
      <div class="dropdown">
        <a class="button">Products &#9660;</a>
        <div class="dropdown-content">
          <a href="../php/currency.php">Currency Converter</a>
          <a href="#">Service 2</a>
        </div>
      </div>
      <div class="dropdown">
        <a class="button" href="../HTML/contact.html">Contact Us &#9660;</a>
        <div class="dropdown-content">
          <a href="#">Contactez-nous<img src="../CSS/frenchflag.png" style="height: 20px; position: absolute; margin: 2px;"></a>
          <a href="#">Cont&aacute;ctenos<img src="../CSS/mexicanflag.png" style="height: 25px; position: absolute;"></a>
        </div>
      </div>
      <a class="button" href="../HTML/aboutme.html">About</a>
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
      document.write(`Good morning`);
  } else if ( ( (D.getHours() == 12 && D.getMinutes() > 0) || (D.getHours() > 12) ) &&
                (D.getHours() < 18 || (D.getHours() == 18 && D.getMinutes() == 0) ) ) {
      document.write(`Good afternoon`);
  } else {
    document.write(`Good evening`);
  }
}
