<!DOCTYPE html>

<html lang="fr">

	<head>
		<meta charset="utf-8" />
		<title>Cox-Ross-Rubinstein</title>
		<link rel="stylesheet" type="text/css" media="screen" href="/includes/style.css"/>
		<script type="text/javascript" src="http://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-AMS-MML_HTMLorMML"> </script>
	</head>

	<body>
		
		<div id="main_wrapper">
			
			<?php include($_SERVER["DOCUMENT_ROOT"] . '/includes/header.php'); ?>

			<?php include($_SERVER["DOCUMENT_ROOT"] . '/includes/menu.php'); ?>

			<?php include($_SERVER["DOCUMENT_ROOT"] . '/sciences/finance/finance_menu.php'); ?>

			<div id="finance">

				<h1>La formule de Cox-Ross-Rubinstein</h1>

				<p>Maintenant que nous avons bien compris comment construire un simple modèle discret unipériodique pour déterminer la valeur de
				la prime \(V_{0}\), il suffira d'un simple petit pas, et donc quelques lignes supplémentaires, pour déterminer l'expression 
				qui va nous donner cette prime pour un modèle réaliste à \(n\) périodes. Vous allez voir, il n'y a rien de plus simple!</p>
				
				<p>Reprenons notre modèle binomial:
					<ul>
						<li>à \(t = 0\), nous avons : \(S_{0}\)</li>
						<li>à \(t = 1\), nous avons : \(S_{1} = b \times S_{0}\) ou bien \(S_{1} = h \times S_{0}\)</li>
						<li>à \(t = 2\), nous avons : \(S_{2} = b^{2} \times S_{0}\) ou \(S_{2} = b \times h \times S_{0}\) ou 
						\(S_{2} = h^{2}\times S_{0}\)</li>
						<li>et ainsi de suite jusqu'à \(t = n\) ...</li>
					</ul></p>	
						
				<p>Nous venons de voir, avec le modèle unipériodique précédent, que l'on pouvait aisément déterminer la valeur de la prime à
				l'instant \(t\) en fonction de sa valeur en \(t + 1\) :
				$$ V_{t} = \frac{1}{1 + r}[q \times V_{t + 1}(hS_{t}) + (1 - q) \times V_{t + 1}(bS_{t})] $$
				où \(q\) et \(1 - q\) représente des probabilités.</p>	
							 
				<p>Partant de là, il est aisé de calculer la valeur de la prime à l'instant \(t - 1\) en fonction de sa valeur en \(t\) :
				$$ V_{t - 1} = \frac{1}{1 + r}[q \times V_{t}(hS_{t - 1}) + (1 - q) \times V_{t}(bS_{t - 1})] $$</p>	
						
				<p>Et de même :
				$$ V_{t - 2} = \frac{1}{1 + r}[q \times V_{t - 1}(hS_{t - 2}) + (1 - q) \times V_{t - 1}(bS_{t - 2})] $$</p>			
					
				<p>En injectant l'expression de \(V_{t - 1}\) dans l'expression précédente :
				$$ V_{t - 2} = \frac{1}{1 + r} \{q \times \frac{1}{1 + r}[q \times V_{t}(h^{2}S_{t - 2}) + (1 - q) \times V_{t}(b \times h 
				\times S_{t - 2})] $$
				$$ + (1 - q) \times \frac{1}{1 + r}[q \times V_{t}(h \times b \times S_{t - 2}) + (1 - q) \times V_{t}(bS_{t - 2})]\} $$
				$$ \Leftrightarrow $$
				$$ V_{t - 2} = \frac{1}{(1 + r)^{2}} \{q^{2} \times V_{t}(h^{2}S_{t - 2}) + q(1 - q) \times V_{t}(b \times h \times 
				S_{t - 2}) + (1 - q)q \times V_{t}(h \times b \times S_{t - 2}) $$
				$$ + (1 - q)^{2} \times V_{t}(b^{2}S_{t - 2})\} $$
				$$ \Leftrightarrow $$
				$$ V_{t - 2} = \frac{1}{(1 + r)^{2}} \{q^{2} \times V_{t}(h^{2}S_{t - 2}) + 2q(1 - q) \times V_{t}(b \times h \times 
				S_{t - 2}) + (1 - q)^{2} \times V_{t}(b^{2}S_{t - 2})\} $$</p>	
					
				<p>Et là, que reconnaît on ?</p>
				
				<p>Allez, je veux vous entendre tous en choeur me dire, d'un air satisfait, le... <strong>Binôme de Newton!</strong></p>
				
				<p>Nous pourrions en effet, continuez les calculs et injecter \(V_{t - 2}\) dans \(V_{t - 3}\), \(V_{t - 3}\) dans \(V_{t - 4}\),
				et ainsi de suite jusqu'à l'ordre \(n\) ... Nous reconnaîtrons alors les développements à l'ordre \(3\), \(4\), jusqu'à \(n\)
				du binôme de Newton, mais nous allons nous épargner cette torture puisque nous n'en avons pas besoin!</p>

				<p>Il suffisait juste de remarquer que notre bon vieux binôme de Newton était caché par là. Une simple récurrence pourrait alors prouver
				que le résultat est similaire quelquesoit la période pour laquelle nous voulons évaluer l'expression de \(V_{t}\).</p> 
				 
				<p>Ainsi, en "descendant" de pas en pas, nous allons finir par atteindre \(V_{0}\), c'est-à-dire l'expression de la prime, que 
				nous cherchons.</p>

				<p>Nous pouvons alors évaluer la valeur de la prime d'une option européenne à l'aide de l'expression suivante, 
				appelée <strong>formule de Cox-Ross-Rubinstein</strong> :
				$$ \boxed{ V_{0}(S_{0}) = \frac{1}{(1 + r)^{n}} \sum_{k = 0}^{n} C\begin{pmatrix} n \\ k \end{pmatrix} \; q^{n} \; (1 - q)^{n - k} \;
				V_{t}(h^{n}b^{n - k}S_{0}) } $$
				</p>
				
				<p id="links"><a href="./../tools/CRR_binomial_tool.php"><br/><br/>TP : Pricing avec le modèle binomial</a><br/><br/></p>
				
			</div>		

			<?php include($_SERVER["DOCUMENT_ROOT"] . '/includes/footer.php'); ?>	

		</div>
	</body>
</html>	