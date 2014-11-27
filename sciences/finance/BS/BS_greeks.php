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

				<h1>Les grecs</h1>	

				<p>Maintenant que nous avons explicité clairement la formule de Black-Scholes pour un call ainsi que pour un put,
				et testé ceci, nous pouvons encore allez plus loin.</p>
				
				<p>En effet, il serait intéressant de s'intéresser aux variations de ce call ou de ce put par rapport à divers paramètres.
				Ces indicateurs spécifiques sont appelées très sobrement <strong>lettres grecques</strong>, ou simplement <strong>grecques</strong>.
				</p>
				
				<p>Et bien, sans suspens, je vous annonce que nous allons étudier ces fameuses grecques ici et maintenant!</p>	

				<h2>Delta</h2>
				
				<p>La lettre grecque <strong>Delta</strong> représente la sensibilité de la valeur d'une option par rapport à une variation donnée
				du prix de l'actif sous-jacent à celle-ci, pour un call ou bien pour un put.</p>

				<p>Il prend alors la forme suivante :
				$$
				\boxed 
				{
				\left.
					\begin{array}{r c l}
					\delta_{call} &=& \frac{\partial C}{\partial S} = N(d1)\\
					\delta_{put} &=& \frac{\partial P}{\partial S} = \delta_{call} - 1 = N(d1) - 1\\
					
					\end{array}
				\right.
				}
				$$								
				</p> 

				<p>Ici, \(N(x) \) représente la <strong>loi normale centrée réduite</strong>.</p>

				<p>Nous pouvons voir ici que \(\delta \) est nécessairement compris entre \(0\) et \(1\) pour un call et, symétriquement,
				compris entre \(-1\) et \(0\) pour un put.

				<p>Tandis que \(\delta \) pour un call est une fonction croissante du prix de l'actif sous-jacent, \(\delta \) pour un put,
				lui, est une fonction décroissante du prix de l'actif sous-jacent.</p>

				<p>Quand \(\delta = 0.5 \), c'est-à-dire quand le prix de l'actif sous-jacent est égal au strike, on dit que l'option est 
				<strong>à la monnaie</strong>.</p>

				<p>En effet, ceci se comprend facilement : plus le prix de l'actif sous-jacent est élevé et plus la probabilité que
				le call soit dans la monnaie est grande. Inversement, plus le prix de l'actif sous-jacent est bas et plus la probabilité que
				le put soit dans la monnaie est grande.</p>

				<p>Enfin, logiquement, \(\delta \) pour un un portefeuille d'option est la somme des \(\delta \) respectifs des options.</p>

				<h2>Gamma</h2>

				<p>Le facteur <strong>Gamma</strong> va, en quelques sortes, nous renseigner sur la vitesse d'évolution du prix de l'option par rapport 
				au prix de l'actif sous-jacent : 
				$$ \boxed{ \gamma_{call} = \gamma_{put} = \frac{\partial^{2} C}{\partial S^{2}} = \frac{\partial^{2} P}{\partial S^{2}}
							= \frac{N'(d1)}{S \sigma \sqrt t} } $$

				<p>Par analogie avec la physique, on peut voir ce facteur \(\gamma \) comme une accélération du prix de l'option, si on considère
				\(\delta \) comme sa vitesse.</p>

				<p>\(\gamma \) est maximum lorsque l'option est à la monnaie.</p>

				<p>Enfin, tout naturellement, \(\gamma \) pour un portefeuille d'options est la somme des \(\gamma \) de chacune des options qui le 
				composent.</p>

				<h2>Theta</h2>

				<p><strong>Theta</strong> nous renseigne sur l'évolution de la valeur de l'option au cours du temps :
				$$
				\boxed
				{
				\left.
					\begin{array}{r c l}
					\theta_{call} &=& - \frac{\partial C}{\partial t} &=& - \frac{S N'(d1) \sigma}{2 \sqrt t} - r K \exp(-r t)  N(d2)\\
					\theta_{put} &=& - \frac{\partial P}{\partial t} &=& - \frac{S N'(d1) \sigma}{2 \sqrt t} + r K \exp(-r t)  N(-d2)\\
					\end{array}
				\right.
				}
				$$
				</p>

				<h2>Vega</h2>

				<p>Le facteur <strong>Vega</strong> représente la sensibilité du prix de l'option par rapport à la volatilité de l'actif sous-jacent :
				$$ \boxed{ \nu_{call} = \nu_{put} = \frac{\partial C}{\partial \sigma} = \frac{\partial P}{\partial \sigma} = S \sqrt t N'(d1) } $$
				</p>

				<p>Pourquoi mesurer le \(\nu \) ? Et bien car une augmentation parallèle de la volatilité aura plus d'impact sur les options dont la
				date d'échéance est éloignée que sur celles dont celle-ci est proche.</p>

				<h2>Rho</h2>

				<p>Enfin, <strong>Rho</strong> va nous renseigner sur le taux de variation de la valeur de la prime par rapport au taux d'intérêt :
				$$
				\boxed
				{
				\left.
					\begin{array}{r c l}
					\rho_{call} &=& \frac{\partial C}{\partial r} &=& K t \exp(-r t) N(d2)\\
					\rho_{put} &=& \frac{\partial P}{\partial r} &=& - K t \exp(-r t) N(-d2)\\
					\end{array}
				\right.
				}
				$$
				</p>
				
				<p><br/><br/><br/><br/></p>
				
				<p id="links"><a href="./../Tools/BS_greeks_tool.php">TP : Les grecques</a></p>

			</div>
			   
			<?php include($_SERVER["DOCUMENT_ROOT"] . '/includes/footer.php'); ?>	
		</div>
	</body>
</html>