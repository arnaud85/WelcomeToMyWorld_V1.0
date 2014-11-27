<!DOCTYPE html>

<html lang="fr">

	<head>
		<meta charset="utf-8" />
		<title>Black-Scholes</title>
		<link rel="stylesheet" type="text/css" media="screen" href="/includes/style.css"/>
		<script type="text/javascript" src="http://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-AMS-MML_HTMLorMML"> </script>
	</head>
	
	<body>
		<div id="main_wrapper">
			
			<?php include($_SERVER["DOCUMENT_ROOT"] . '/includes/header.php'); ?>

			<?php include($_SERVER["DOCUMENT_ROOT"] . '/includes/menu.php'); ?>

			<?php include($_SERVER["DOCUMENT_ROOT"] . '/sciences/finance/finance_menu.php'); ?>
			
			<div id="finance">

				<h1>Le modèle de Black-Scholes</h1> 				

				<p>Le <strong>modèle de Black-Scholes</strong> (ou encore <strong>Black-Scholes-Merton</strong>) est le modèle le plus utilisé
				au monde quand on parle d'évaluation d'option. C'est un standard que chaque opérateur de marché connait sur le bout des doigts.</p>
				
				<p>Publié pour la première fois par ses auteurs <em>Fischer Black</em> et <em>Myron Scholes</em> en 1973, celui-ci a connu succès 
				retentissant et s'est très vite imposé comme le <em>graal</em> des modèles de <em>pricing</em> d'option.</p>
				
				<p>Un peu plus tard, <em>Robert Merton</em> contribuera à l'amélioration de ce modèle ce qui lui vaudra de recevoir, en compagnie
				de son collègue Myron Scholes, le prix Nobel d'économie en 1997 (Fischer Black étant décédé en 1995, il n'a pu recevoir 
				le prix Nobel, mais sa contibution fut mentionné).</p>
				
				<p>Ultra usité et très réaliste dans une certaine mesure, ce modèle repose cependant sur des hypothèses fortes que l'on va
				énoncer de ce pas :</p>
				
				<p>
					<ul class="theorem">
						<p><strong>Modèle de Black-Scholes</p></strong>
						<li><p>L'option est <strong>européenne</strong> : l'échéance est fixée</p></li>
						<li><p>Le modèle est <strong>continu</strong> et le prix de l'action suit un 
								<strong>mouvement Brownien géométrique</strong></p></li>
						<li><p>Le modèle respecte le <strong>principe de non-arbitrage</strong></p></li>
						<li><p>La valeur de l'option sur l'actif sous-jacent est la solution de l'<strong>équation de Black-Scholes</strong> :
								$$ 
								\frac{\partial V}{\partial t} + r S \frac{\partial V}{\partial S} + 
								\frac{1}{2}\sigma^{2}S^{2}\frac{\partial^{2} V}{\partial S^{2}} - r V = 0 
								$$</p></li>
					</ul>
				</p>
				
				
				<p>Nous allons chercher à résoudre cette équation dans le cas d'un <em>call</em> :
				$$ V(S, t) = C(S, t) = Max\{S - K, 0\} $$
				</p>
				
				<p>Bien sur, une fois la formule mise en évidence pour un <em>call</em>, il est extrêment simple de trouver celle utilisée
				pour un <em>put</em>, ces deux formules étant symétriques de par <strong>la relation de parité call-put</strong>.</p>
				
				<p id="links"><a href="BS_formula.php"><br/><br/>La formule de Black-Scholes</a><br/><br/></p>

			</div>
			   
			<?php include($_SERVER["DOCUMENT_ROOT"] . '/includes/footer.php'); ?>	
		</div>
	</body>
</html>