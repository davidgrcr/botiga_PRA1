 *05\.604·Comerç Electrònic · PRÀCTICA 1 · 2023-2024*
 
*Estudis d’Informàtica Multimèdia iTelecomunicació*

---

# Pràctica 1 de Comerç Electrònic

## Presentació

Aquesta Pràctica se centra en els conceptes apresos en els diferents mòduls de

l'assignatura, realitzant el desenvolupament d'una botiga online bàsica a través

de PHP/MySQL.

Per dur-la a terme, cal treballar en un ordinador amb l'entorn d'Apache XAMPP,

on es desplegarà la solució.

## Competències

- Capacitat de comunicació escrita en l'àmbit acadèmic i professional.

- Capacitat per adaptar-se a les tecnologies i als futurs entorns actualitzant les competències professionals.

- Capacitat per analitzar un problema en el nivell d'abstracció adequat a cada situació i aplicar les habilitats i coneixements adquirits per abordar-lo i resoldre'l.

- Capacitat per aplicar les tècniques específiques de tractament, emmagatzematge i administració de dades.

- Capacitat per proposar i avaluar diferents alternatives tecnològiques per a resoldre un problema concret.

## Objectius

- Creació d'una botiga online bàsica amb HTML, CSS, PHP i MySQL.
  

## Recursos

### Bàsics

- Mòdul “Desenvolupament i administració web amb bases de dades”.


### Complementaris

- https://www.php.net/manual/en/

- Annexos 1, 2 i 3.

## Criteris d’avaluació

La pràctica té com a objectiu familiaritzar-se amb la programació web per crear una

botiga online amb els punts bàsics de tot comerç electrònic.

Per importància de cara a la nota, es podria repartir de la següent manera:

- Realització del punt 1) i punt 2) de la pràctica (50%)

- Realització del punt 3) (20%)

- Realització del punt 4) (30%)

- Realització del punt 5) (opcional per pujar nota)

En l'avaluació no és estrictament necessari completar tots els punts per aprovar.

No obstant, s’ha de tenir en compte que els punts 1 i 2 són un requisit necessari

per poder fer amb èxit la resta dels punts. El punt 5 és opcional per a qui vulgui

apujar nota i compensar altres apartats no realitzats o no completats.

## Format i data de lliurament

La solució s'ha de lliurar en un arxiu comprimit .zip o .rar anomenat

**CognomsNom\_CE\_Practica1** que contindrà els diferents arxius de solució de

la pràctica (arxius php, css, base de dades en format .sql, etc.) i un document

PDF amb l'estat de la pràctica.

El lliurament ha de ser com a màxim el **dimarts 5 de desembre a les 23:59h**, a

la bústia de lliurament d'activitats de l'Aula Virtual de l'assignatura.


## Descripció de la pràctica a realitzar

### Enunciat

En aquest document es fa una descripció de la pràctica 1 de l'assignatura de

Comerç Electrònic. La pràctica consisteix en la implementació d'una botiga

virtual bàsica a partir de diferents punts i es basa en la teoria que s'ha vist en el

mòdul "Gestió de la Informació" dels mòduls didàctics de l'assignatura.

### Introducció

Per desenvolupar la nostra botiga virtual necessitarem els següents elements

tecnològics:

\- Sistema operatiu: es pot treballar amb qualsevol sistema operatiu

(Windows / MacOS / Linux) sobre el qual s'instal·larà l'aplicació XAMPP

(inclou servidor web Apache, MySQL i PHP).

L'eina XAMPP, disponible per a Windows, MacOS i Linux, es pot descarregar en

aquest enllaç: https://www.apachefriends.org/es/index.html

Es recomana descarregar i utilitzar la versió 8.1.x amb PHP 8.1.x per a posterior

compatibilitat amb la pràctica 2. Per a això, es pot descarregar aquesta versió

8\.1.x des d'aquest enllaç: https://www.apachefriends.org/download.html

Consideracions generals:

- No es pot fer ús de CMS com PrestaShop, Woocommerce, Magento o similars.

Ha de ser una programació bàsica però feta des de zero mitjançant HTML/CSS i

PHP.

- Es poden utilitzar frameworks de PHP tipus Laravel o Symfony, però no està

dins de l'abast d'aquesta pràctica aprendre a usar-los.

Descripció dels punts

En aquest apartat es descriuen els punts que conformen la pràctica.

1\. Disseny i implementació de la base de dades de la botiga.

2\. Creació de l'estructura bàsica en HTML / PHP de la botiga.

3\. Gestió de la cistella de la compra.

4\. Gestió del procés de compra online.

5\. Creació d'un panell d'administració per a consulta de les comandes

(opcional).



**Punt 1: disseny i implementació de la base de dades de la botiga.**

S'hauran de crear les taules relacionals necessàries de la botiga online usant el

phpMyAdmin directament o mitjançant la importació d’un fitxer .sql amb

l’estructura de la mateixa.

S’haurà d'identificar les dades necessàries a emmagatzemar en les taules de la

base de dades i crear aquesta en base a aquesta informació i les seves relacions.

Nota important: és obligatori que els productes i categories quedin

emmagatzemats a les taules corresponents de la base de dades i la botiga

llegiu i carregueu aquests productes i categories de manera dinàmica.

També serà necessària la creació d'un usuari i contrasenya per accedir a la base

de dades mitjançant els arxius PHP corresponents.

Es pot utilitzar de referència l'estructura de la base de dades del tema 3 de teoria,

punt 2.2.1, encara que no cal implementar totes les opcions que apareixen com a

estats de comanda, idiomes o facturació.


**Punt 2: creació de l’estructura bàsica en HTML/PHP de la botiga.**

Una estructura bàsica vàlida podria ser la següent (s'inclouen tots els punts demanats

a la pràctica amb imatges orientatives del disseny bàsic de cada secció):

**Pàgina d'inici**

Pàgina on es mostren les categories.

Per exemple, en una botiga de calçat, les categories podrien ser: botes, sabates,

sandàlies, etc.

**Pàgina de categories**

Llistat dels productes d'aquesta categoria.

Aquestes categories i els seus productes associats s'han de carregar de la taula

corresponent de la base de dades.


**Pàgina de producte**

Informació del producte i opció d'afegir a la cistella de la compra.

La informació de cada producte s'ha de carregar de la taula corresponent de la base

de dades.



**Web de la cistella**

Es mostra el contingut de la cistella actual i es permet la compra. S'amplia informació

al punt 3.

**Pàgina de compra**

Resum de la cistella i formulari per realitzar la comanda. S'amplia informació al punt 4.

**Pàgina d'administració (opcional)**

Visualització dels detalls de les comandes emmagatzemades. S'amplia informació al

punt 5.


En aquests punts de creació de l’estructura bàsica de la botiga es poden desenvolupar les opcions de disseny de CSS i JavaScript que es consideri necessari per al codi.

Es pot optar pel disseny que cada alumne i alumna decideixi fer a la seva botiga online sempre que es compleixi amb els requisits sol·licitats.

Nota: en aquest punt es pot fer ús de qualsevol plantilla HTML + CSS existent o de la biblioteca Bootstrap per facilitar la feina.


**Punt 3: gestió de la cistella.**

Creació de la lògica en PHP necessària per a la gestió d'una cistella de la compra

online bàsica.

Com a punts a desenvolupar de cara a obtenir una major nota, es pot considerar la

realització de les següents característiques:

- Accés a la cistella des de totes les pàgines de la botiga online.

- Gestió de les quantitats d'un mateix producte: si s'afegeix diverses vegades el mateix producte, el sistema podria recalcular la quantitat d'aquest producte en lloc d'afegir-lo unitàriament.

Opció d'eliminar productes de la cistella carret.

Hi ha múltiples opcions sobre la realització d'una cistella amb PHP: variables

SESSION o COOKIES.

Als annexos 1 i 2 d'aquest document s'introdueix l'ús de les dues variables. Es deixa

a la vostra elecció fer servir la que més s'adapti al vostre criteri.

A l'annex 3 també trobareu enllaços d'interès per resoldre les parts més complexes

de la botiga.


**Punt 4: gestió del procés de compra online.**

Es demana realitzar una compra en línia dels productes de la botiga, quedant el

procés emmagatzemat a la base de dades.

Aquest procés es podrà fer tant enregistrant un usuari com amb l'opció de convidat.

Per registrar un usuari a la botiga es necessitaran els següents camps com a mínim:

Nom complet, contrasenya (es podrà generar automàticament o la pot introduir

l'usuari), adreça d'enviament i correu electrònic.

Per a un usuari convidat n'hi hauria prou amb indicar el correu electrònic i l'adreça

d'enviament.

Un cop seleccionat el tipus de procés, es demana mostrar un breu resum de les

dades introduïdes i els productes escollits per confirmar la comanda.

Exemple de resum de compra d’un usuari registrat.

En el moment que l'usuari confirmi aquest darrer pas, s'emmagatzemaran totes les

dades de la comanda a la base de dades.

No cal implementar un sistema de login per a usuaris registrats, amb desar la

informació de la compra tant per a un usuari registrat com per a un usuari convidat

seria suficient.

**Punt 5 (opcional): creació d’un panell d’administració per a consulta de

comandes.**

Creació d'un panell bàsic d'administració amb accés mitjançant usuari i

contrasenya per a la consulta de les comandes realitzades a la botiga online. Per

simplificar, aquest usuari i contrasenya poden estar predefinits i formar part del

codi de laplicació.

Com a opció extra es pot afegir la funcionalitat per gestionar els productes i

categories de la botiga des de l'esmentat espai administració.

A continuació, es mostren imatges orientatives del que podria ser la

implementació del tauler d'administració:

Exemple de llistat amb les comandes de la botiga.

Exemple de detalls de comanda.



**Documentació de la pràctica:**

Cal enviar un document on expliqui l'estat de la pràctica amb el següent

contingut:

- Índex amb els diferents apartats o punts que s'han realitzat de la pràctica.

- Codi font de l'aplicació web comprimida en format ZIP o RAR perquè el docent pugui comprovar el funcionament bàsic de l'aplicació:
  - Arxius PHP
  - Base de dades (estructura i dades) en format .sql
  - Altres arxius: .css, .js, imatges, etc.


Per cada punt o apartat en els que està dividida la pràctica, captura de

pantalla de les diferents opcions que s'han implementat (també si es fan les

opcionals) amb els comentaris oportuns de les decisions preses.

Comentaris generals sobre el que es demana a l'enunciat (model de dades,

operacions extres, etc.).

Si hi ha alguna operació inacabada o que dóna error i no s'ha pogut

solucionar, ha indicar-ho amb els comentaris oportuns.

Valoració personal de la pràctica: Com us ha anat? Què heu trobat més

difícil? Què ha estat el més interessant? Suggeriments, comentaris, etc.


### ANNEX 1. Ús de variables $\_SESSION

Les sessions són una forma senzilla d'emmagatzemar dades de manera individualitzada

utilitzant un ID de sessió únic per a cada usuari.

Això es pot fer servir per fer persistent la informació d'estat entre peticions de pàgines, i

per al nostre cas en concret, gestionar una cistella.

Exemple #1 Registrar una variable $\_SESSION

```<?php

session\_start();

$\_SESSION['carro'] = array();

?>

Exemple #2 Recórrer una variable $\_SESSION

<?php

session\_start();

foreach($\_SESSION['carro'] as $producto) {

…

}

?>
```
Exemple #3 Deregistrar una variable $\_SESSION
```
<?php

session\_start();

unset($\_SESSION['carro']);

?>

```

**ANNEX 2. Ús de variables $\_COOKIE**

Les cookies (galetes) són un mecanisme que permet emmagatzemar dades en el

navegador i així poder rastrejar o identificar usuaris recurrents.

Cal tenir en compte que una galeta reemplaçarà a una galeta anterior que tingués el

mateix nom en el navegador, de manera que per al cas d’una cistella de la compra,

caldrà recuperar en un array auxiliar les dades d'aquesta galeta (Exemple 2), realitzar

les operacions necessàries i després actualitzar-la de nou (Exemple 1).

A continuació, es mostren les operacions més habituals:

Exemple #1 Registrar una variable $\_COOKIE
```
<?php

$carrito = array();

$tiempo = time() + (60 \* 60);

setcookie('carro', serialize($carrito), $tiempo);

?>
```
Exemple #2 Recuperar valors d’una variable $\_ COOKIE
```
<?php

$carrito = unserialize($\_COOKIE['carro']);

foreach($carrito as $clave => $valor) {

…

}

?>
```
Exemple #3 Deregistrar una variable $\_ COOKIE
```
<?php

unset($\_COOKIE['carro']);

?>
```

ANNEX 3. Enllaços d’interès.

\- Creació de formularis en HTML (anglès):

https://www.w3schools.com/html/html\_forms.asp

\- Ús de variables GET a PHP (anglès):

https://www.php.net/manual/en/reserved.variables.get.php

\- Ús de variables POST a PHP (anglès):

https://www.php.net/manual/en/reserved.variables.post.php

\- Gestió de variables GET i POST amb formularis (anglès):

https://www.php.net/manual/en/language.variables.external.php

