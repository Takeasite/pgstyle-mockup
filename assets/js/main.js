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

  // Modale machine : ouverture au clic sur une carte, fermeture par croix / clic dehors / Echap
  var modal = document.getElementById("machineModal");
  if (modal) {
    var mmPhoto = document.getElementById("mmPhoto");
    var mmBrand = document.getElementById("mmBrand");
    var mmName = document.getElementById("mmName");
    var mmDesc = document.getElementById("mmDesc");
    var lastFocus = null;

    function openModal(card) {
      lastFocus = card;
      mmPhoto.src = card.getAttribute("data-photo") || "";
      mmPhoto.alt = card.getAttribute("data-name") || "";
      mmBrand.textContent = card.getAttribute("data-brand") || "";
      mmName.textContent = card.getAttribute("data-name") || "";
      mmDesc.textContent = card.getAttribute("data-desc") || "";
      modal.classList.add("is-open");
      modal.setAttribute("aria-hidden", "false");
      document.body.classList.add("no-scroll");
      var closeBtn = modal.querySelector(".machine-modal__close");
      if (closeBtn) closeBtn.focus();
    }

    function closeModal() {
      modal.classList.remove("is-open");
      modal.setAttribute("aria-hidden", "true");
      document.body.classList.remove("no-scroll");
      if (lastFocus) lastFocus.focus();
    }

    document.querySelectorAll("[data-machine]").forEach(function (card) {
      card.addEventListener("click", function () {
        openModal(card);
      });
    });

    modal.querySelectorAll("[data-close]").forEach(function (el) {
      el.addEventListener("click", closeModal);
    });

    document.addEventListener("keydown", function (e) {
      if (e.key === "Escape" && modal.classList.contains("is-open")) {
        closeModal();
      }
    });
  }
})();
