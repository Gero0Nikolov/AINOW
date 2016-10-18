<div class="wrap">
	<h1>AINOW - Statistics</h1>
	<h3 id="ainow-legend-controller">Legend<span id="indentifier">+</span></h3>
	<a href="http://dloober.com/writing-posts-ainow/" id="ainow-help" target="_blank"><h3>How to write the posts?</h3></a>
	<div id="ainow-legend">		
		<p>In the table below are listed all posts which were <em>"hitted"</em> by your visitors.</p>
		<h3>User UID</h3>
		<p>The User Unique ID is generated by a simple algorith: Previous_Interest_ID + 1 @ WEBSITE_DOMAIN</p>
		<p>This UUID is stored at the user browser as a localStorage indentifier.</p>
		<h3>User IP</h3>
		<p>The User IP is used to get the visitor location at the moment when he hit the post.</p>
		<p>This can help you to see what people like in the different areas.</p>
		<h3>Interest</h3>
		<p>This is the full title of the post that your visitors had read.</p>
		<h3>Hits</h3>
		<p>There are listed how many times a single visitor have hit that post.</p>
		<h3>Country</h3>
		<p>The country from which the visitor hit that post.</p>
		<h3>Region Name</h3>
		<p>The region from which the visitor hit that post.</p>
		<h3>Region ZIP</h3>
		<p>The ZIP Code of the region from which the visitor hit that post.</p>
	</div>
	<table id="ainow-stats">
		<tr>
			<th>User UID</th>
			<th>User IP</th>
			<th>Interest (Post Title)</th>
			<th>Hits</th>
			<th>Country</th>
			<th>City</th>
			<th>Region Name</th>
			<th>Region ZIP</th>			
		</tr>		
		<?php
		global $wpdb;

		$ainow_table = $wpdb->prefix ."ainow_users";
		$sql_ = "SELECT * FROM $ainow_table ORDER BY user_interests_hits DESC";
		$ainow_statistics = $wpdb->get_results( $sql_, OBJECT );

		foreach ( $ainow_statistics as $statistic_ ) {
			$ip_tracker_ = unserialize( file_get_contents( 'http://ip-api.com/php/'. $statistic_->user_ip ) );
			?>
			<tr>
				<td title="<?php echo $statistic_->user_uid; ?>"><?php echo $statistic_->user_uid; ?></td>
				<td title="<?php echo $statistic_->user_ip; ?>"><?php echo $statistic_->user_ip; ?></td>
				<td title="<?php echo $statistic_->user_interests; ?>"><?php echo $statistic_->user_interests; ?></td>
				<td title="<?php echo $statistic_->user_interests_hits; ?>"><?php echo $statistic_->user_interests_hits; ?></td>
				<td title="<?php echo $ip_tracker_[ "country" ]; ?>"><?php echo $ip_tracker_[ "country" ]; ?></td>
				<td title="<?php echo $ip_tracker_[ "city" ]; ?>"><?php echo $ip_tracker_[ "city" ]; ?></td>
				<td title="<?php echo $ip_tracker_[ "regionName" ]; ?>"><?php echo $ip_tracker_[ "regionName" ]; ?></td>
				<td title="<?php echo $ip_tracker_[ "zip" ]; ?>"><?php echo $ip_tracker_[ "zip" ] ?></td>
			</tr>
			<?php
		}
		?>		
	</table>
</div>