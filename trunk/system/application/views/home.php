    <div id="page_title">
        <h3>Welcome</h3>
    </div>
   <div id="page_navigation">
{foreach from=$MenuItems item=item}
        <a href='{site_url path="page/show/{$item.Name}"}'>{$item.Name}</a>
{/foreach}
    </div>
    <div id="page_body">
        Welcome to the beta version of league connect.
        <br><br>
        This is currently a work in progress. Please report all bugs <a href="http://code.google.com/p/leagueconnect/issues/entry">here</a>.
    </div>
