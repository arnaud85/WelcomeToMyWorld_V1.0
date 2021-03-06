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

				<h1>La formule de Black-Scholes</h1>
				
				<p>La résolution de l'<em>équation de Black-Scholes</em> va s'effectuer en plusieurs étapes :
				<ul>
					<li>Etape 1 : Transformation de l'équation par un changement de variable adéquat</li>
					<li>Etape 2 : Résolution de cette nouvelle équation</li>
					<li>Etape 3 : Retour au variables d'origines et mise en évidence des formules de <em>pricing</em>
					pour un call et pour un put</li>
				</ul>

				<p>Allons-y, on a du boulot!</p>
				
				<h2>Le changement de variable</h2>
				
				<p>La tactique ici est de se ramener, par un changement de variable certes un peu compliqué, à une équation plus commune, 
				que les physiciens connaissent très bien d'ailleurs : la fameuse <strong>équation de la chaleur</strong>
				(<strong>heat equation</strong> en anglais).</p>
				
				<p>En effet, nous savons résoudre explicitement cette équation, et il suffira donc de repasser dans le système de variables initial
				pour en déduire une solution à notre problème. Facile, n'est-ce pas ?</p>	

				<p>Pour ce faire, nous opérerons le changement de variable suivant :
				$$
				\left\{
					\begin{array}{r c l}
					x &=& ln(\frac{S}{K})\\
					\tau &=& T - \frac{1}{2}\sigma^{2}t\\
					v(S, t) &=& K \times C(S, t)\\
					\end{array}
				\right.
				$$		
				
				<p><br/></p>
				
				<p>Nous pouvons ainsi calculer les termes \(\frac{\partial C}{\partial t}\), \(\frac{\partial C}{\partial S}\) 
				et \(\frac{\partial^{2} C}{\partial S^{2}}\)</p>

					<h3>Calcul de \(\frac{\partial C}{\partial t}\) :</h3>

					<p>$$ \frac{\partial C}{\partial t} = \frac{\partial C}{\partial \tau} \times \frac{\partial \tau}{\partial t} 
					= K \frac{\partial v}{\partial \tau} \times \frac{\partial \tau}{\partial t} 
					= - \frac{1}{2}\sigma^{2}K\frac{\partial v}{\partial \tau} $$</p>

					<h3>Calcul de \(\frac{\partial C}{\partial S}\) :</h3>

					<p>$$ \frac{\partial C}{\partial S} = \frac{\partial C}{\partial x} \times \frac{\partial x}{\partial S} 
					= K \frac{\partial v}{\partial x} \times \frac{1}{S} 
					= \frac{K}{S}\frac{\partial v}{\partial x} $$</p>

					<h3>Calcul de \(\frac{\partial^{2} C}{\partial S^{2}}\) :</h3>

					<p>$$ \frac{\partial^{2} C}{\partial S^{2}} = \frac{\partial}{\partial S}(\frac{K}{S} \frac{\partial v}{\partial x}) $$
					$$ \Leftrightarrow $$
					$$ \frac{\partial^{2} C}{\partial S^{2}} = \frac{\partial}{\partial S}(\frac{K}{S})\frac{\partial v}{\partial x} +
					\frac{K}{S}\frac{\partial}{\partial S}(\frac{\partial v}{\partial x}) $$
					$$ \Leftrightarrow $$
					$$ \frac{\partial^{2} C}{\partial S^{2}} = - \frac{K}{S^{2}}\frac{\partial v}{\partial x} + 
					\frac{K}{S}\frac{\partial x}{\partial S}\frac{\partial^{2} v}{\partial x^{2}} $$
					$$ \Leftrightarrow $$
					$$ \frac{\partial^{2} C}{\partial S^{2}} = - \frac{K}{S^{2}}\frac{\partial v}{\partial x} + 
					\frac{K}{S^{2}}\frac{\partial^{2} v}{\partial x^{2}} $$</p>

					<p>L'équation devient alors :
					$$ - \frac{1}{2}\sigma^{2}K\frac{\partial v}{\partial \tau} + 
					\frac{1}{2}\sigma^{2}S^{2} (- \frac{K}{S^{2}}\frac{\partial v}{\partial x} + 
					\frac{K}{S^{2}}\frac{\partial^{2} v}{\partial x^{2}}) + 
					r S \frac{K}{S}\frac{\partial v}{\partial x} 
					- r K v = 0 $$</p>

					<p>Divisons cette expression par \(- \frac{1}{2}\sigma^{2}K\) et posons \(k = \frac{r}{\frac{1}{2}\sigma^{2}}\) :
					$$ \frac{\partial v}{\partial \tau} + (1 - k)\frac{\partial v}{\partial x} - \frac{\partial^{2} v}{\partial x^{2}} + k v = 0 $$</p>

					<p>Enfin, posons \(v = \exp(\alpha x + \beta \tau) \times f(x, \tau)\) :
					$$
					\left\{
						\begin{array}{r c l}
						\frac{\partial v}{\partial \tau} &=& \beta \exp(\alpha x + \beta \tau) f + 
						\exp(\alpha x + \beta \tau) \frac{\partial f}{\partial \tau}\\
						
						\frac{\partial v}{\partial x} &=& \alpha \exp(\alpha x + \beta \tau) f + 
						\exp(\alpha x + \beta \tau) \frac{\partial f}{\partial x}\\
						
						\frac{\partial^{2} v}{\partial x^{2}} &=& \alpha^{2} \exp(\alpha x + \beta \tau) f + 
						2 \alpha \exp(\alpha x + \beta \tau) \frac{\partial f}{\partial x} + 
						\exp(\alpha x + \beta \tau) \frac{\partial^{2} f}{\partial x^{2}}\\
						\end{array}
					\right.
					$$
					</p>

					<p>En remplaçant dans l'expression et en divisant par \(\exp(\alpha x + \beta \tau)\), nous obtenons :
					$$ \frac{\partial f}{\partial \tau} + (\beta + (1 - k) \alpha - \alpha^{2} + k) f + ((1 - k) 
					- 2 \alpha) \frac{\partial f}{\partial x} - \frac{\partial^{2} f}{\partial x^{2}}$$</p>

					<p>Pour obtenir une équation de type équation de la chaleur, nous devons nécessairement annuler 
					les termes en \(f\) et \(\frac{\partial f}{\partial x}\) :
					$$
					\left\{
						\begin{array}{r c l}
						\beta + (1 - k) \alpha - \alpha^{2} + k &=& 0\\
						(1 - k) - 2 \alpha &=& 0\\
						\end{array}
					\right.
					$$
					</p>
	
					<p>Ce qui, par suite, nous donne :
					$$
					\left\{
						\begin{array}{r c l}
						\alpha &=& \frac{1 - k}{2}\\
						\beta &=& - \frac{(1 + k)^{2}}{4}\\
						\end{array}
					\right.
					$$
					</p>

					<p>Dans ces conditions, nous nous ramenons alors à la fameuse <strong>équation de la chaleur</strong> :
					$$ \boxed{ \frac{\partial f}{\partial \tau} = \frac{\partial^{2} f}{\partial x^{2}} } $$</p>

				<h2>Résolution de l'équation de la chaleur</h2>
					
				<p>Nous connaissons tous la solution de cette équation (du moins les physiciens!) :
				$$ \boxed{ f(x, \tau) =  \frac{1}{2\sqrt(\Pi \tau)} \int_{0}^{+\infty} f_{0}(z) \exp(-\frac{(x - z)^{2}}{4 \tau}) dz } $$</p>

				<p>Posons : 
				$$ Z = \frac{z - x}{\sqrt(2 \tau)} \Rightarrow dZ = \frac{dz}{\sqrt(2 \tau)} $$
				</p>
				
				<p>On a :
				$$  f(x, \tau) = \frac{1}{\sqrt(2\Pi)} \int_{-\frac{x}{\sqrt(2\tau)}}^{+\infty} f_{0}(z) \exp(-\frac{Z^{2}}{2}) dz $$</p>
				</p>
				
				<p>Or, nous savons que : 
				$$ C(S, t) = K v(S, t) = K \exp(\frac{1 - k}{2}x - \frac{(1 + k)^{2}}{4} \tau) f(x, \tau) $$
				Donc, lorsque \(\tau = 0 \), nous avons :
				$$ C(S, \tau = 0) = Max\{K\exp(x) - K, 0\} = K \exp(\frac{1 - k}{2}x) f_{0}(z) $$
				D'où :
				$$ f_{0}(z) = \frac{Max\{K\exp(z) - K, 0\}}{K \exp(\frac{1 - k}{2}z)}  = 
				\frac{K (\exp(z) - 1)}{K \exp(\frac{1 - k}{2}z)} = \exp(\frac{k + 1}{2}z) - \exp(\frac{k - 1}{2}z) $$</p>

				<p>Donc, nous avons notre expression :
				$$ f(x, \tau) = \frac{1}{\sqrt(2\Pi)} \int_{-\frac{x}{\sqrt(2\tau)}}^{+\infty} (\exp(\frac{k + 1}{2}z) - \exp(\frac{k - 1}{2}z)) \exp(-\frac{Z^{2}}{2}) dz $$</p>
				
				<p>Posons :
				$$
				\left\{
					\begin{array}{r c l}
					I1 &=& \frac{1}{\sqrt(2\Pi)} \int_{-\frac{x}{\sqrt(2\tau)}}^{+\infty}\exp(\frac{k + 1}{2}z)\exp(-\frac{Z^{2}}{2}) dz\\
					I2 &=& \frac{1}{\sqrt(2\Pi)} \int_{-\frac{x}{\sqrt(2\tau)}}^{+\infty}\exp(\frac{k - 1}{2}z)\exp(-\frac{Z^{2}}{2}) dz\\
					\end{array}
				\right.
				$$

				<p>Travaillons maintenant sur ces deux expressions :
				$$ I1 = \frac{1}{\sqrt(2\Pi)} \int_{-\frac{x}{\sqrt(2\tau)}}^{+\infty}\exp(\frac{k + 1}{2}z)\exp(-\frac{Z^{2}}{2}) dz $$
				$$ \Leftrightarrow $$
				$$ I1 = \frac{1}{\sqrt(2\Pi)} \int_{-\frac{x}{\sqrt(2\tau)}}^{+\infty}\exp(\frac{k + 1}{2}(\sqrt(2\tau)Z + x))\exp(-\frac{Z^{2}}{2}) dz $$
				$$ \Leftrightarrow $$
				$$ I1 = \frac{\exp(\frac{k + 1}{2}x)}{\sqrt(2\Pi)}\int_{-\frac{x}{\sqrt(2\tau)}}^{+\infty}\exp(\frac{k + 1}{2}\sqrt(2\tau)Z -\frac{Z^{2}}{2}) dz $$
				Remarquons l'identité remarquable (!) suivante :
				$$ Z^{2} - (k + 1)\sqrt(2\tau)Z = Z^{2} - 2 \frac{(k + 1)\sqrt(2\tau)Z}{2} = 
				(Z - \frac{(k + 1)\sqrt(2\tau)}{2})^{2} - (\frac{k + 1}{2}\sqrt(2\tau))^{2} $$
				Et donc :
				$$ I1 = \frac{\exp(\frac{k + 1}{2}x + \frac{(k + 1)^2}{4}\tau)}{\sqrt(2\Pi)} 
				\int_{-\frac{x}{\sqrt(2\tau)}}^{+\infty} \exp(- \frac{(Z - \frac{k + 1}{2}\sqrt(2\tau))^{2}}{2}) $$</p>

				<p>Un dernier petit changement de variable :
				$$ \rho = Z - \frac{k + 1}{2}\sqrt(2\tau) \Rightarrow d\rho = dZ $$
				</p>
				
				<p>Il résulte :
				$$ I1 = \frac{\exp(\frac{k + 1}{2}x + \frac{(k + 1)^2}{4}\tau)}{\sqrt(2\Pi)} 
				\int_{-\frac{x}{\sqrt(2\tau)} - \frac{(k + 1)\sqrt(2\tau)}{2}}^{+\infty} \exp(- \frac{\rho^{2}}{2})d\rho $$
				$$ \Leftrightarrow $$
				$$ I1 = \frac{\exp(\frac{k + 1}{2}x + \frac{(k + 1)^2}{4}\tau)}{\sqrt(2\Pi)} 
				\int_{-\infty}^{\frac{x}{\sqrt(2\tau)} + \frac{(k + 1)\sqrt(2\tau)}{2}} \exp(- \frac{\rho^{2}}{2})d\rho $$
				</p>
				
				<p>Posons :
				$$ \boxed{ d1 = \frac{x}{\sqrt(2\tau)} + \frac{(k + 1)\sqrt(2\tau)}{2} } $$
				</p>
				
				<p>On reconnait alors une <strong>loi normale centrée réduite N(0, 1)</strong> telle que :
				$$ \boxed{ N(0, 1) = \frac{1}{\sqrt(2\Pi)}\int_{-\infty}^{d1}\exp(-\frac{x^{2}}{2})dx } $$
				</p>
				
				<p>Donc :
				$$ I1 = \exp(\frac{k + 1}{2}x + \frac{(k + 1)^{2}}{4}\tau) N(d1) $$
				</p>

				<p>De même, on trouve :
				$$ I2 = \exp(\frac{k - 1}{2}x + \frac{(k - 1)^{2}}{4}\tau) N(d2) $$
				</p>
				
				<p>Avec :
				$$ \boxed{ d2 = \frac{x}{\sqrt(2\tau)} + \frac{(k - 1)\sqrt(2\tau)}{2} } $$
				</p>
				
				<h2>La formule de Black-Scholes</h2>	

				<p>Il nous reste maintenant à revenir au système de départ pour exprimer la relation voulue :
				$$ C(S, t) = K \exp(\alpha x + \beta \tau) f(x, \tau) $$</p>	

				<p>Avec :			
	 			<ul>
					<li>\(x = ln(\frac{S}{K}) \)</li>
					<li>\(\tau = \frac{1}{2}\sigma^{2}(T - t) \)</li>					
					<li>\(k = \frac{r}{\frac{1}{2}\sigma^{2}} \)</li>					
					<li>\(\alpha = \frac{1 - k}{2} \)</li>	
					<li>\(\beta = - \frac{(1 + k)^{2}}{4} \)</li>	
					<li>\(d1 = \frac{x}{\sqrt(2\tau)} + \frac{(k + 1)\sqrt(2\tau)}{2} \)</li>	
					<li>\(d2 = \frac{x}{\sqrt(2\tau)} + \frac{(k - 1)\sqrt(2\tau)}{2} \)</li>	
					<li>\(f(x, \tau) = \exp(\frac{k + 1}{2}x + \frac{(k + 1)^{2}}{4}\tau) N(d1) - \exp(\frac{k - 1}{2}x + \frac{(k - 1)^{2}}{4}\tau) N(d2) \)</li>		
				</ul></p>

				<p>Après calculs, nous pouvons enfin exprimer la <strong>formule de Black-Scholes</strong> pour le <em>pricing</em> d'un call :
				$$ \boxed{ C(S, t) = S N(d1) - K \exp(-r(T - t)) N(d2) } $$
				Où :
				<ul>
					<li><p>\(d1 = \frac{ln(\frac{S}{K}) + (r + \frac{\sigma^{2}}{2})(T - t)}{\sigma \sqrt(T - t)} \)</p></li>
					<li><p>\(d2 = \frac{ln(\frac{S}{K}) + (r - \frac{\sigma^{2}}{2})(T - t)}{\sigma \sqrt(T - t)} \)</p></li>
					<li><p>\(N(x) \) : loi normale centrée réduite</p></li>
					<li><p>\(S \) : prix de l'actif sous-jacent</p></li>
					<li><p>\(N(x) \) : loi normale centrée réduite</p></li>					
					<li><p>\(r \) : taux d'intérêt (constant)</p></li>					
					<li><p>\(K \) : strike (prix d'exercice, fixé à l'avance)</p></li>	
					<li><p>\(T \) : échéance, fixé à l'avance</p></li>
				</ul>
				</p>

				<p><br/>Par symétrie, nous pouvons exprimer la formule de Black-Scholes pour le <em>pricing</em> d'un put en nous
				servons de la <strong>relation de parité Call-Put</strong> :
				$$ \boxed{ C(S, t) - P(S, t) = S(t) - K \exp(-r(T - t)) } $$
				</p>
				
				<p>De plus, on a :
				$$ N(x) + N(-x) = 1 $$
				</p>

				<p>Nous avons alors :
				$$ \boxed{ P(S, t) = K \exp(-r(T - t)) N(-d2) - S N(-d1) } $$</p>

				<p id="links"><a href="./..//Tools/BS_pricing_tool.php"><br/><br/>TP : Pricing avec Black-Scholes</a><br/><br/></p>

			</div>
			   
			<?php include($_SERVER["DOCUMENT_ROOT"] . '/includes/footer.php'); ?>	
		</div>
	</body>
</html>