<!DOCTYPE html>

<html lang="fr">

	<head>
		<meta charset="utf-8" />
		<title>Finance de marché</title>
		<link rel="stylesheet" type="text/css" media="screen" href="/includes/style.css"/>
		<script type="text/javascript" src="http://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-AMS-MML_HTMLorMML"> </script>
	</head>

	<body>
		
		<div id="main_wrapper">
			
			<?php include($_SERVER["DOCUMENT_ROOT"] . '/includes/header.php'); ?>

			<?php include($_SERVER["DOCUMENT_ROOT"] . '/includes/menu.php'); ?>

			<?php include($_SERVER["DOCUMENT_ROOT"] . '/sciences/finance/finance_menu.php'); ?>

			<div id="finance">

				<h1>Les concepts financiers de base</h1>
					
				<p>Nous allons découvrir maintenant quelques concepts de base utilisés dans les modèles d'évaluation d'options
				qui seront présentés par la suite.</p>
						  
				<p>Le premier concept que nous allons voir est le <strong>principe de non-arbitrage</strong> qui la pierre angulaire de
				tous bon modèle de <em>pricing</em> d'option. Ce principe nous assure tout simplement que le marché n'est pas biaisé.</p>
				
				<p>Nous introduirons également le principe de <strong>vente à découvert</strong>, principe également important dans les modèles
				de <em>pricing</em> d'options.
				
				<h2>Le principe de non-arbitrage</h2>
					
				<p>Pour s'assurer de la validité du modèle, il est nécessaire de faire en sorte que le marché ne soit pas biaisé, c'est-à-dire que
				tout le monde joue avec les mêmes cartes. C'est ainsi que l'on va faire intervenir un dogme de base pour ériger notre modèle 
				afin de pouvoir s'appuyer sur des bases solides. Cette hypothèse de base est connu sous le nom de 
				<strong>principe de non-arbitrage</strong> :</p>
	
				<p class="theorem"><strong>Principe de non-arbitrage</strong> :<br/>
				Il est impossible de faire une série de transactions financières sans investissement initial et qui ont comme résultat de 
				générer, à coup sûr, un profit.</p>
						
				<p>Concrêtement, que nous dit ce principe ? Et bien tout simplement, que nous ne pouvons pas gagner à tous les coups en réalisant
				des investissements financiers et surtout pas sans céder une mise au départ. En d'autre termes, tout investissement financier
				permettant de réaliser des plus-values doit s'acompagner d'un risque.</p>
				
				<p>Ainsi, le principe de non-arbitrage nous dit qu'une personne qui gagnerait à tous les coups en réalisant des opérations sur les
				marchés financiers sans jamais engager de mise au départ serait forcément un escroc et il s'agit là de délit d'initié (condamné
				par la loi!).</p>
						
				<p>En outre, le principe de non-arbitrage nous assure qu'en prenant le risque de réaliser des opérations sur les marchés 
				financiers, il est possible de gagner plus d'argent qu'avec seulement un compte d'épargne mais, en contrepartie, il est 
				également probable d'en gagner moins. Pour gagner plus d'argent, il faut prendre des risques, et donc le risque d'en perdre.
				A l'opposé le compte d'épargne permet de gagner un peu d'argent sans risque mais jamais autant qu'en jouant sur les marchés
				financiers. Nous pouvons ainsi traduire ce principe de non-arbitrage par l'inégalité suivante :
				$$ \boxed{ bas \times S_{t} \leqslant (1 + taux \,\, d'intérêt) \times S_{t} \leqslant haut \times S_{t} } $$</p>
						 
				<p>Dernier point, hautement important, qui découle naturellement de ce principe de non-arbitrage : deux actifs au rendement 
				identique doivent avoir obligatoirement le même prix. Ainsi, si nous possédons deux actifs \(X\) et \(Y\), nous aurons
				l'implication suivante :
				$$ \boxed{ (X_{t} = Y_{t}) \Rightarrow (X_{0} = Y_{0}) } $$</p>
				
				<h2>Vente à découvert</h2>		
				
				<p>Concrêtement, qu'est-ce qu'une <strong>vente à découvert</strong> ?</p>

				<p>Et bien c'est tout simplement le fait de vendre quelquechose que l'on ne possède pas. C'est exprimé d'une façon caricaturale, 
				mais c'est exactement le principe.</p>
				
				<p class="theorem"><strong>Vente à découvert</strong> :<br/>On emprunte une action A en promettant de la restituer à son créancier 
				à une date ultérieure, fixée d'avance. Le but est de vendre cette action pour en tirer des bénéfices avant de restituer celle-ci à son
				propriétaire.</p>
				
				<p>Il faut bien noter que c'est une action que l'on emprunte et non une somme! Ainsi, à l'échéance T, c'est la valeur de l'action
				à la date T, c'est-à-dire \(S_{T}\), et non \(S_{0}(1 + r)^{T}\), ce qui fait toute la différence car la valeur de l'action
				peut fortement varier pendant cette période!</p>

				<p>L'intérêt est, bien évidemment, de vendre cette action plus chère que le prix 
				qu'elle vaudra à la date T, puisqu'il faudra la restituer à son propriétaire, à l'échéance.</p>
						
			</div>

			<?php include($_SERVER["DOCUMENT_ROOT"] . '/includes/footer.php'); ?>	

		</div>
	</body>
</html>		