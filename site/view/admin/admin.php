<article>
	<h1>Admin</h1>
    <div class="box">
		<?= $message; ?>
        <form method="post" action="">

            <label for="identifiant">Identifiant</label>
            <input type="text" name="pseudo" id="identifiant" id="pseudo" placeholder="Saisissez votre identifiant">
            <span class="erreurPseudo"></span>
            <label for="mdp">Mot de Passe</label>
            <input type="password" name="password" id="mdp" placeholder="Composer votre mot de passe" readonly minlength="6">
            <span class="erreurPassword"></span>    
            <div class="grilleCode">

                <button type="button" class="boutonCode" value="0" onclick="saisieCode(this.value)">0</button>
                <button type="button" class="boutonCode" value="1" onclick="saisieCode(this.value)">1</button>
                <button type="button" class="boutonCode" value="2" onclick="saisieCode(this.value)">2</button>
                <button type="button" class="boutonCode" value="3" onclick="saisieCode(this.value)">3</button>
                <button type="button" class="boutonCode" value="4" onclick="saisieCode(this.value)">4</button>
                <button type="button" class="boutonCode" value="5" onclick="saisieCode(this.value)">5</button>
                <button type="button" class="boutonCode" value="6" onclick="saisieCode(this.value)">6</button>
                <button type="button" class="boutonCode" value="7" onclick="saisieCode(this.value)">7</button>
                <button type="button" class="boutonCode" value="8" onclick="saisieCode(this.value)">8</button>
                <button type="button" class="boutonCode" value="9" onclick="saisieCode(this.value)">9</button>
                <button type="button" class="boutonCode" value="" onclick="saisieCode(this.value)"></button>
                <button type="button" class="boutonCode" value="" onclick="saisieCode(this.value)"></button>
                <button type="button" class="boutonCode" value="" onclick="saisieCode(this.value)"></button>
                <button type="button" class="boutonCode" value="" onclick="saisieCode(this.value)"></button>
                <button type="button" class="boutonCode" value="" onclick="saisieCode(this.value)"></button>
                <button type="button" class="boutonCode" value="" onclick="saisieCode(this.value)"></button>


            </div>

            <button type="submit" id="envoyer">Valider</button>
            <button type="button" id="effacer" id="soumission" onclick="effacement()">Effacer</button>


        </form>

        <p><a href="#">Mot de passe oublié?</a></p>
    </div>
</article>