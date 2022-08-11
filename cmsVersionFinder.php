<?php
//  grep '</version>' language/pt-BR/pt-BR.xml            JOOMLA
//  grep -m1 -e Drupal CHANGELOG.txt                      DRUPAL
//  grep '$wp_version =' wp-includes/version.php          WORDPRESS
//  php tools/upgrade.php check | grep 'Code version:'    OJS

//$sitesArray = ["www.coordenacaopsicologia.uff.br", "www.helade.uff.br", "www.mesmip.uff.br", "www.pgfi.uff.br", "www.revistaabphe.uff.br", "www.cpt.uff.br", "www.helenismo.uff.br", "www.metaconsultoria.uff.br", "www.pgmat.uff.br", "www.revistabecan.uff.br", "www.cscampos.uff.br", "www.hidrouff.uff.br", "www.ph.uff.br", "www.revistadecriticatextual.uff.br", "www.cursosonline.uff.br", "www.histoembrionf.uff.br", "www.pibid.uff.br", "www.revistadepedagogiasocial.uff.br", "www.degeografia.uff.br", "www.icex.uff.br", "www.mmi.uff.br", "www.poiesis.uff.br", "www.revistaeas.uff.br", "www.depgan.uff.br", "www.ichs.uff.br", "www.mobilidadein.uff.br", "www.pontaojongo.uff.br", "www.revistalagos.uff.br", "www.designvisual.uff.br", "www.imunobiologia.uff.br", "www.molmodcs.uff.br", "www.posling.uff.br", "www.revistamundolivre.uff.br", "www.alece.uff.br", "www.dinamica.uff.br", "www.insau.uff.br", "www.museudememes.uff.br", "www.poslit.uff.br", "www.revistaquerubim.uff.br", "www.alimentos.uff.br", "www.diversitates.uff.br", "www.isis.uff.br", "www.mzo.uff.br", "www.ppgdap.uff.br", "www.revistas.uff.br", "www.anaisabralin.uff.br", "www.doutoradosg.uff.br", "www.jsncare.uff.br", "www.nab.uff.br", "www.ppgeet.uff.br", "www.revsts.uff.br", "www.anaisdosappil.uff.br", "www.dst.uff.br", "www.labceo.uff.br", "www.nediger.uff.br", "www.ppgeq.uff.br", "www.run.uff.br", "www.anisakis.uff.br", "www.eadro.uff.br", "www.labem.uff.br", "www.nehmaat.uff.br", "www.ppgio.uff.br", "www.saef.uff.br", "www.antenabrasil.uff.br", "www.editais.uff.br", "www.labhidro.uff.br", "www.nemic.uff.br", "www.ppgmidiaecotidiano.uff.br", "www.samu.uff.br", "www.artes.uff.br", "www.eduff.uff.br", "www.labhoi.uff.br", "www.neonatologia.uff.br", "www.ppgtur.uff.br", "www.sbijournal.uff.br", "www.astronomiapadua.uff.br", "www.eletras.uff.br", "www.lablux.uff.br", "www.neo.uff.br", "www.ppg.uff.br", "www.seminarioposletras.uff.br", "www.atas.uff.br", "www.emdialogo.uff.br", "www.lacord.uff.br", "www.nepur.ead.uff.br", "www.pragmatizes.uff.br", "www.singularidades.uff.br", "www.atlashistovet.uff.br", "www.enecienciasanais.uff.br", "www.lagesp.uff.br", "www.nesa.uff.br", "www.premiodeexcelencia.uff.br", "www.sismica.uff.br", "www.atuaria.uff.br", "www.engenhariavr.uff.br", "www.lamate.uff.br", "www.neu.uff.br", "www.prepopular.uff.br", "www.sisvaznat.uff.br", "www.auditoriasocial.uff.br", "www.ensinosaudeambiente.uff.br", "www.lamcep.uff.br", "www.noticias.uff.br", "www.proale.uff.br", "www.spa.uff.br", "www.automata.uff.br", "www.ess.uff.br", "www.lamem.uff.br", "www.nueg.uff.br", "www.processosdenegocios.uff.br", "www.sti.uff.br", "www.biosseguranca.uff.br", "www.estagio.uff.br", "www.lame.uff.br", "www.nutricao.uff.br", "www.producao.uff.br", "www.teleodontonf.uff.br", "www.cadegeo.uff.br", "www.estatisticacomr.uff.br", "www.lamfi.uff.br", "www.observasmjc.uff.br", "www.projetomacacu.uff.br", "www.temponiteroi.uff.br", "www.campos.uff.br", "www.faculdadedeodontologia.uff.br", "www.lar.uff.br", "www.observatoriojovem.uff.br", "www.prolocal.uff.br", "www.tessitura.uff.br", "www.cefa.uff.br", "www.ficaon.bibliotecas.uff.br", "www.las.uff.br", "www.observatoriooceanografico.uff.br", "www.protesefixa.uff.br", "www.tgc.uff.br", "www.ceia.uff.br", "www.fiscal.uff.br", "www.ldrx.uff.br", "www.olimpiadadecartografiaead.uff.br", "www.psicologia.uff.br", "www.tgr.uff.br", "www.cemesf.uff.br", "www.gedif.uff.br", "www.lecar.uff.br", "www.operacaophp.uff.br", "www.punf.uff.br", "www.traducao.uff.br", "www.centrodeartes.uff.br", "www.geofisica.uff.br", "www.lel.uff.br", "www.pediatria.uff.br", "www.puvr.uff.br", "www.transporteproad.uff.br", "www.ceo.uff.br", "www.geographia.uff.br", "www.lfqm.uff.br", "www.pensario.uff.br", "www.rascunho.uff.br", "www.transporte.uff.br", "www.citi.uff.br", "www.geoquimica.uff.br", "www.lia.uff.br", "www.pep.uff.br", "www.rasi.uff.br", "www.vep.uff.br", "www.colab.uff.br", "www.geo.uff.br", "www.lis.uff.br", "www.periodicoshumanas.uff.br", "www.rdm.uff.br", "www.videoaulas.uff.br", "www.compchem.uff.br", "www.gepie.uff.br", "www.lsp.uff.br", "www.pesquisadores.uff.br", "www.reacad.uff.br", "www.webquest.uff.br", "www.competenciaeminformacao.uff.br", "www.gfl.uff.br", "www.lura.uff.br", "www.pesquisa.uff.br", "www.recem-nascido.uff.br", "www.compras.uff.br", "www.gma.uff.br", "www.mda.uff.br", "www.petgestaosocial.uff.br", "www.rec.uff.br", "www.conselhos.uff.br", "www.gsi.uff.br", "www.meib.uff.br", "www.petveterinaria.uff.br", "www.restaurante.uff.br", "www.contracampo.uff.br", "www.guiadoestudante.uff.br", "www.memoria.uff.br", "www.pgeb.uff.br", "www.rest.uff.br"];

$sitesArray = scandir(DIRECTORY_SEPARATOR."var". DIRECTORY_SEPARATOR. "www". DIRECTORY_SEPARATOR);

$source = "Site,CMS,Version,Beta\n";

for ($i = 0; $i < count($sitesArray); $i++) {

    $path = DIRECTORY_SEPARATOR . 'var' . DIRECTORY_SEPARATOR . "www" . DIRECTORY_SEPARATOR . $sitesArray[$i] . DIRECTORY_SEPARATOR . "public_html" . DIRECTORY_SEPARATOR;

//WORDPRESS version file
    $wordpressFilePath = $path . "wp-includes/version.php";
//JOOMLA version file
    $joomlaFilePath = $path . "language/pt-BR/pt-BR.xml";
//DRUPAL version file
    $drupalFilePath = $path . "CHANGELOG.txt";
//OJS version file
    $ojsFilePath = $path . "tools/upgrade.php";

    switch ($path){
        case file_exists($wordpressFilePath):
            $re = '/(\$wp_version = \')|(\';)/m';
            $wordpressCommand = shell_exec("grep '\$wp_version =' " . $wordpressFilePath);
            $subst = '';
            $result = preg_replace($re, $subst, $wordpressCommand);
            $source .= "$sitesArray[$i],WORDPRESS," . $result;
            break;
        case file_exists($joomlaFilePath):
            $re = '/(\s{0,}<version>)|(<\/version>)/m';
            $joomlaCommand = shell_exec("grep '<\/version>' " . $joomlaFilePath);
            $subst = '';
            $result = preg_replace($re, $subst, $joomlaCommand);
            $source .= "$sitesArray[$i],JOOMLA," . $result;
            break;
        case file_exists($drupalFilePath):
            $drupalCommand = shell_exec("grep -m1 -e Drupal " . $drupalFilePath);
            $re = '/(Drupal )|(, \d{0,4}-\d{0,2}-\d{0,2})/m';
            $str = $drupalCommand;
            $subst = '';
            $source .= "$sitesArray[$i],DRUPAL,".preg_replace($re, $subst, $str);
            break;
        case file_exists($ojsFilePath):
            $ojsCommand = shell_exec("php $ojsFilePath check | grep 'Code version:'");
            $source .= "$sitesArray[$i],OJS," . trim(str_replace('Code version:      ', "", $ojsCommand), "");
            break;
        default:
            $source .= "$sitesArray[$i],Unknown,Unknown\n";
    }

}

$file = fopen('cmsVersion.csv', 'w');
fwrite($file, $source);
fclose($file);