function checkAnswers() {
    const correctAnswers = {
      q1: "Ownership",
      q2: "Zerodha",
      q3: "BSE",
      q4: "Profit"
    };

    let score = 0;
    for (let key in correctAnswers) {
      const selected = document.querySelector(`input[name="${key}"]:checked`);
      if (selected && selected.value === correctAnswers[key]) {
        score++;
      }
    }

    const resultDiv = document.getElementById('result');
    resultDiv.textContent = `You scored ${score} out of 4! 📈`;
    resultDiv.classList.remove('hidden');
  }


  function reload(){
    window.location.reload()
  }