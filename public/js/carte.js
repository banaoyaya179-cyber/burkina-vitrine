/* ══════════════════════════════════════════
   CARTE.JS — version API
══════════════════════════════════════════ */
(function() {
  'use strict';

  const API = '/api';

  var DETAILS = {
    kadiogo: { villes:['Ouagadougou','Saaba','Pabré','Komsilga','Koubri'], etablissements:['Université Joseph Ki-Zerbo','Université Norbert Zongo (antenne)','Université Ouaga II','INSSA','CNHU Bogodogo'], entreprises:['SONABHY','SONABEL','ONEA','Brakina','SN-Citec','FESPACO'], note:'Capitale nationale, cœur politique, économique et culturel du Burkina Faso.' },
    nando: { villes:['Koudougou','Réo','Yako','Léo','Sapouy','Boussé'], etablissements:['Université Norbert Zongo','CHR de Koudougou','Lycée Municipal de Koudougou','ENEP','INAFAC'], entreprises:['FILSAH','SOFITEX','Sucrerie du Sourou','SODEPAL'], note:"Koudougou, 3ème ville du Burkina, est le centre de cette région." },
    nazinon: { villes:['Manga','Pô','Léo','Sapouy','Tiébélé','Ziou'], etablissements:['CHR de Manga','Lycée Provincial de Manga','Centre de Formation de Pô'], entreprises:['Élevage bovin','Culture du sésame','Pêche sur le Nazinon'], note:'Tiébélé et ses cases royales Kassena est un joyau culturel.' },
    nakambe: { villes:['Tenkodogo','Koupèla','Ouargaye','Bittou','Garango'], etablissements:['CHR de Tenkodogo','Lycée Provincial de Tenkodogo','École Nationale de Santé (antenne)'], entreprises:["Mine d'or de Bissa",'Agriculture : mil, sorgho','Élevage transhumant'], note:'Carrefour stratégique entre le centre et l\'est du pays.' },
    kuilse: { villes:['Kaya','Boulsa','Kongoussi','Pissila','Barsalogho'], etablissements:['CHR de Kaya','Lycée Provincial de Kaya','ENEP de Kaya','Barrage de Kongoussi'], entreprises:["Mines d'or de Youga",'SOFITEX','Élevage camelin et bovin'], note:'Région de transition entre le sahel et le soudanien.' },
    yaadga: { villes:['Ouahigouya','Titao','Yako','Gourcy','Koumbri'], etablissements:['CHR de Ouahigouya','IFSI Ouahigouya','Lycée Municipal de Ouahigouya'], entreprises:['SOFITEX','Culture du coton','Élevage bovin','Artisanat bogolan'], note:'Ouahigouya est une ville historique royale Mossi.' },
    liptako: { villes:['Dori','Gorom-Gorom','Sebba','Falagountou','Markoye'], etablissements:['CHR de Dori','Lycée Provincial de Dori',"Centre d'Élevage de Dori",'Mare d\'Oursi'], entreprises:['Élevage camelin et bovin','Pêche Mare d\'Oursi','Marché de sel Gorom-Gorom'], note:"La Mare d'Oursi est un écosystème fragile et site touristique majeur." },
    sirba: { villes:['Bogandé','Gayéri','Piéla','Bilanga','Thion'], etablissements:['CHR de Bogandé','Lycée Provincial de Bogandé'], entreprises:['Mine de Tambao','Élevage transhumant','Agriculture pluviale'], note:'La rivière Sirba traverse la région vers le Niger.' },
    tapoa: { villes:['Diapaga','Kantchari','Botou','Tansarga'], etablissements:['CHR de Diapaga','Lycée Provincial de Diapaga','Parc National d\'Arly'], entreprises:['Tourisme faunique','Élevage bovins','Agriculture : sorgho'], note:'Le Parc National d\'Arly, site UNESCO, est l\'un des plus grands parcs d\'Afrique de l\'Ouest.' },
    oubri: { villes:['Ziniaré','Boussé','Zorgho','Mogtédo','Meguet'], etablissements:['CHR de Ziniaré','Mausolée T. Sankara','Lycée Provincial de Ziniaré'], entreprises:['Maraîchage barrage Mogtédo','Élevage avicole','Artisanat local'], note:'Oubri abrite Ziniaré, bassin agricole important.' },
    goulmou: { villes:["Fada N'Gourma",'Pama','Diapangou','Kompienga'], etablissements:["CHR de Fada N'Gourma",'Centrale de Kompienga','Lycée Municipal de Fada'], entreprises:['Centrale hydraulique Kompienga 145MW',"Mine d'or d'Essakane",'Culture du sésame'], note:'Le barrage de Kompienga alimente en électricité une grande partie du pays.' },
    bankui: { villes:['Dédougou','Solenzo','Boromo','Safané'], etablissements:['CHR de Dédougou','Lycée Provincial de Dédougou','Parc W zone tampon'], entreprises:['SOFITEX (principale zone cotonnière)','Culture coton, maïs','Pêche sur le Mouhoun'], note:'Bankui est le grenier cotonnier du Burkina.' },
    sourou: { villes:['Tougan','Nouna','Toma','Kassoum'], etablissements:['CHR de Tougan','Aménagement Vallée du Sourou','Lycée Provincial de Tougan'], entreprises:['Périmètre irrigué Sourou','Culture du coton','Pêche dans le Sourou'], note:'La vallée du Sourou est le plus grand périmètre irrigué du Burkina.' },
    guiriko: { villes:['Bobo-Dioulasso','Orodara','Houndé','Dandé','Bama'], etablissements:['Université Nazi Boni','CHU Sanou Souro','Grande Mosquée de Bobo (1880)','Lycée Ouézin Coulibaly'], entreprises:['Brakina','SN-Citec','SOFITEX siège régional','Aéroport International de Bobo'], note:'Bobo-Dioulasso, 2ème ville du Burkina, est le poumon économique de l\'ouest.' },
    tannounyan: { villes:['Banfora','Sindou','Niankôrôdougou','Mangodara'], etablissements:['CHR de Banfora','ISGE','Lycée Provincial de Banfora','SOSUCO'], entreprises:['SOSUCO sucrerie','SITAB tabac','Cultures café et cacao','Tourisme Cascades'], note:'Tannounyan est la région la plus humide du Burkina.' },
    djoro: { villes:['Gaoua','Diébougou','Batié','Dano','Kampti','Loropéni'], etablissements:['CHR de Gaoua','Musée de Gaoua','Ruines de Loropéni UNESCO','Lycée Provincial de Gaoua'], entreprises:["Mine d'or de Poura",'Culture du coton','Artisanat Lobi'], note:'Djorô est le pays des Lobi et des ruines de Loropéni, seul site UNESCO du Burkina.' },
    soum: { villes:['Djibo','Arbinda','Baraboulé','Tongomayel'], etablissements:['CHR de Djibo','Lycée Provincial de Djibo',"Centre d'Élevage de Djibo"], entreprises:['Élevage camelin','Commerce de bétail','Artisanat Touareg'], note:'Soum est le pays des Rimaïbé et des Touaregs. Djibo est un marché de bétail transfrontalier.' },
  };

  async function init() {
    try {
      const res = await fetch(`${API}/regions`);
      const regions = await res.json();

      // Charger les détails (provinces) pour chaque région
      const details = await Promise.all(
        regions.map(r => fetch(`${API}/regions/${r.slug}`).then(res => res.json()))
      );

      renderRegionsDetail(details);
      if (window.initScrollReveal) setTimeout(initScrollReveal, 200);
    } catch(err) {
      console.error('Erreur carte:', err);
    }
  }

  function renderRegionsDetail(regions) {
    var grid = document.getElementById('regions-detail-grid');
    if (!grid) return;

    grid.innerHTML = regions.map(function(r, i) {
      var d = DETAILS[r.slug] || {};
      var villes      = d.villes        || [];
      var etab        = d.etablissements || [];
      var entreprises = d.entreprises    || [];
      var note        = d.note           || '';
      var provinces   = r.provinces      || [];

      return '<div class="region-detail-card reveal" style="transition-delay:' + (i%3*100) + 'ms">' +
        '<h3>🏛️ ' + r.nom + '</h3>' +
        '<p class="chef">📍 Chef-lieu : <strong>' + r.chef_lieu + '</strong> &nbsp;|&nbsp; ' +
          provinces.length + ' province(s)</p>' +
        (villes.length ? '<div class="detail-section"><h4>🏘️ Villes & villages principaux</h4>' +
          '<div class="tags-row">' + villes.map(v => '<span class="tag-sm">' + v + '</span>').join('') + '</div></div>' : '') +
        (etab.length ? '<div class="detail-section"><h4>🎓 Établissements & infrastructures</h4>' +
          '<p>' + etab.join(' • ') + '</p></div>' : '') +
        (entreprises.length ? '<div class="detail-section"><h4>💼 Économie & entreprises</h4>' +
          '<p>' + entreprises.join(' • ') + '</p></div>' : '') +
        (note ? '<div class="detail-section" style="border-top:1px solid var(--border);padding-top:var(--sp-3);margin-top:var(--sp-3)">' +
          '<p style="font-style:italic;color:var(--text-muted)">' + note + '</p></div>' : '') +
        '<a href="/region?region=' + r.slug + '" class="voir-btn">Explorer ' + r.nom + ' →</a>' +
      '</div>';
    }).join('');
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }
})();
