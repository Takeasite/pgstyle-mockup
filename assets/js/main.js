/* PG Style, maquette - comportements front
 * Menu mobile, annee du footer, formulaire de demonstration.
 */
(function () {
  "use strict";

  // Menu mobile : ouvre / ferme la navigation
  var burger = document.querySelector(".nav__burger");
  var nav = document.getElementById("nav");
  if (burger && nav) {
    burger.addEventListener("click", function () {
      nav.classList.toggle("is-open");
    });
    // Referme le menu apres un clic sur un lien
    nav.querySelectorAll("a").forEach(function (a) {
      a.addEventListener("click", function () {
        nav.classList.remove("is-open");
      });
    });
  }

  // Annee courante dans le footer
  var year = document.querySelector("[data-year]");
  if (year) {
    year.textContent = new Date().getFullYear();
  }

  // Formulaire de contact : maquette sans back-office
  var form = document.querySelector("[data-contact-form]");
  if (form) {
    var submit = form.querySelector("[data-submit]");
    if (submit) {
      submit.addEventListener("click", function (e) {
        e.preventDefault();
        alert(
          "Maquette de demonstration : sur le site final, votre demande sera envoyee directement a Pierrick."
        );
      });
    }
  }
})();
