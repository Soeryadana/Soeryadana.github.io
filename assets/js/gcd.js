document.getElementById('encrypt-form').addEventListener("submit", function (evt) {

    const k1 = document.getElementById('k1').value;
    let aInv = 0;
    let flag = 0;
    let mod = 0;

    for (let i = 0; i < 26; i++) {
        flag = k1 * i;
        mod = flag % 26
        // console.log(mod)

        if (mod == 1) {
            aInv = true;
        }
    }
    
    console.log(aInv)

    if (!aInv) {
        alert("GCD of K1 (\u03B1) and 26 are not equal to 1");
        evt.preventDefault();
        documnet.getElementById('k1').focus();
    }
})