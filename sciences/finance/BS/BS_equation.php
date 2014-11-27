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

				<h1>L'équation de Black-Scholes</h1>	

				<p>Nous venons de voir comment représenter les variations du prix d'une action au cours du temps : celle-ci
				décrit un mouvement Brownien géométrique :
				$$ dS(t) = \mu S(t) dt + \sigma S(t) dB(t) $$
				</p>

				<p>Nous cherchons maintenant, comme précédemment avec le modèle de Cox-Ross-Rubinstein, à évaluer la valeur d'une
				option d'achat ou de vente, que nous appelerons \(V \) sur cette action. A ceci près que le prix de l'action va varier 
				d'une façon continue dans le temps (et non discrète comme précédemment!) et aléatoire.</p>

				<p>La valeur de l'option va donc être la solution de ce que l'on appelle une <strong>équation différentielle stochastique</strong>, 
				que l'on établie à l'aide du lemme d'Itô :
				$$ dV = \frac{\partial V(S, t)}{\partial t} dt + \frac{\partial V(S, t)}{\partial S} dS + 
						\frac{1}{2} \frac{\partial^{2} V(S, t)}{\partial S^{2}} \sigma^{2} S^{2}dt $$
				</p>
				
				<p>Nous pouvons alors injecter l'expression décrivant le prix de l'action dans cette expression :
				$$ dV = \frac{\partial V(S, t)}{\partial t} dt + 
					\frac{\partial V(S, t)}{\partial S} (\mu S(t) dt + \sigma S(t) dB(t)) + 
					\frac{1}{2} \frac{\partial^{2} V(S, t)}{\partial S^{2}} \sigma^{2} S^{2}dt $$				
				</p>

				<p>A présent, nous allons regrouper les termes totalement déterministes, facteurs de \(dt \), et isoler le seul terme aléatoire, 
				c'est-à-dire celui contenant le <em>mouvement Brownien</em> \(dB(t) \) :
				$$ dV = (\frac{\partial V(S, t)}{\partial t} + 
					\mu S(t) \frac{\partial V(S, t)}{\partial S} +
					\frac{1}{2} \frac{\partial^{2} V(S, t)}{\partial S^{2}} \sigma^{2} S^{2}) dt + 
					\sigma S(t) \frac{\partial V(S, t)}{\partial S} dB(t) $$	
				</p>

				<p>Maintenant, souvenons-nous de notre portefeuille <em>riskless</em>. Celui-ci est composé d'un nombre constant d'actions, que nous
				nommerons \(\Delta \), ainsi que d'options.</p>
				
				<p>Fabriquons donc notre portefeuille <em>riskless</em> à partir de l'expression précédente en lui ajoutant nos \(\Delta \) actions :
				$$ dV + \Delta dS = (\frac{\partial V(S, t)}{\partial t} + 
					\mu S(t) \frac{\partial V(S, t)}{\partial S} +
					\frac{1}{2} \frac{\partial^{2} V(S, t)}{\partial S^{2}} \sigma^{2} S^{2}) dt + 
					\sigma S(t) \frac{\partial V(S, t)}{\partial S} dB(t) + \Delta dS $$
				</p>

				<p>Avec l'expression de \(dS \) et en réarrangeant un peu de façon à, comme précédemment, séparer les termes déterministes et 
				stochastiques, nous obtenons :
				$$ dV + \Delta dS = (\frac{\partial V(S, t)}{\partial t} + 
					\mu S(t) \frac{\partial V(S, t)}{\partial S} +
					\frac{1}{2} \frac{\partial^{2} V(S, t)}{\partial S^{2}} \sigma^{2} S^{2} + $$
				$$  \mu S(t) \Delta) dt + \sigma S(t) (\frac{\partial V(S, t)}{\partial S}  + \Delta ) dB(t) $$
				</p>

				<p>Maintenant, attention les yeux! Nous allons éliminer le risque dans ce portefeuille! Comment faire ? Rien de plus simple : éliminons le terme aléatoire de 
				l'équation!
				$$ (\frac{\partial V(S, t)}{\partial S}  + \Delta ) dB(t) = 0 \Leftrightarrow \boxed{\Delta = - \frac{\partial V(S, t)}{\partial S}}$$
				</p>
				
				<p>Des termes s'annulent et nous avons alors :
				$$ dV - \frac{\partial V(S, t)}{\partial S} dS = (\frac{\partial V(S, t)}{\partial t} + 
				\frac{1}{2} \sigma^{2} S^{2} \frac{\partial^{2} V(S, t)}{\partial S^{2}}) dt $$
				$$ \Leftrightarrow $$
				$$ \frac{d(V - \frac{\partial V(S, t)}{\partial S} S)}{dt} = \frac{\partial V(S, t)}{\partial t} + 
				\frac{1}{2} \sigma^{2} S^{2} \frac{\partial^{2} V(S, t)}{\partial S^{2}} $$
				</p>

				<p>Or, par définition, avec le taux d'intérêt \(r \) :
				$$ \frac{d(V + \Delta dS)}{dt} = r \times (V + \Delta dS) $$
				$$ \Leftrightarrow $$
				$$ \frac{d(V - \frac{\partial V(S, t)}{\partial S} S)}{dt} = r \times (V - \frac{\partial V(S, t)}{\partial S} S) $$
				</p>
				
				<p>En réarrangeant encore un peu, nous obtenons la fameuse <strong>équation de Black-Scholes</strong> :
				$$ \boxed{ \frac{\partial V(S, t)}{\partial t} + 
				r S \frac{\partial V(S, t)}{\partial S} + 
				\frac{1}{2} \sigma^{2} S^{2} \frac{\partial^{2} V(S, t)}{\partial S^{2}}) -
				r V = 0 } $$
				</p>

				<p id="links"><a href="./BS_model.php"><br/><br/>Le modèle de Black-Scholes</a><br/><br/></p>

			</div>
			   
			<?php include($_SERVER["DOCUMENT_ROOT"] . '/includes/footer.php'); ?>	
		</div>
	</body>
</html>