#The AINOW Plugin
<p>Here I'll share with you <strong>"What you can do on it?"</strong> as a developer and <strong>"How to do that?"</strong>.</p>

<p>In the box comes:
	<ul>
		<li>Ainow.PHP - This is the core of the plugin.</li>
		<li>Ainow_Statistics.PHP - This is the AINOW Statistics page used in the WP Dashboard.</li>
		<li>Assets folder
			<ul>
				<li>CSS folder
					<ul>
						<li>Admin.SCSS - It is compiled to standart CSS in the Admin.CSS</li>
						<li>Front.SCSS - It is compiled to standart CSS in the Front.CSS</li>
					</ul>
				</li>
				<li>SCRIPTS folder
					<ul>
						<li>Admin.JS - Here is a simple JS script used in the AINOW Statistics page. Currently it comes with simple function which is used to control the legend button. In case you want to extend the functionality of the Statistics page here is the place!</li>
						<li>Front.JS - Here are the functions for the front-end.</li>
					</ul>
				</li>
			</ul>
		</li>		
	</ul>
</p>

<p>As the plugin description says:</p>
<p style="border-left: 3px solid #2ecc71; padding-left: 1.15em;">This plugin is great for story tellers which have what to say and most of all, they want to share amazing stories with the world!</p>
<p>So you its algorithm is built and optimized for that kind of <em>machine learning</em>. But in case you want to change it in different direction it would be a please to add you as a contributor! :-)</p>

#How to extend the functionality?
<p>Before you start to build your idea on the plugin you have to know: <strong>How the plugin saves the information?</strong>, <strong>How the plugin interacts with the user?</strong></p>

<p>How the plugin save the information?</p>
<p>The plugin creates additional table in the Database of the host. That table is called WPDB_PREFIX_ainow_users. There are saved the:
	<ul>
		<li>The unique ID of each user - <strong>user_uid</strong></li>
		<li>The unique interest of each user - <strong>user_interests</strong></li>
		<li>The "hits" on each of the user interests - <strong>user_interests_hits</strong></li>
		<li>The IP address from which the user have reached your website - <strong>user_ip</strong></li>
	</ul>
</p>

<p>To identify each user the AINOW plugin stores the unique user id (UUID) in the <strong>localStorage</strong> of the user. In this way the plugin stays away from the COOKIES bad policies and makes the access to the desired values faster.</p>
<p>To keep the track of the current user the AINOW plugin stores his/hers ID into a $_SESSION variable, which allows to the plugin to know the user without the need the ID to be send every single time the page is reloaded.</p>

...TO BE CONTINUED...
