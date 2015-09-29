{if isset($error_msgs)}
                
                <div id="error">
                    <h1>Erreur</h1>
{section name=error_sec0 loop=$error_msgs}
                    <p>{$error_msgs[error_sec0]}</p>
{/section}
                    <form action="{$previous_url}" method="post">
                        <input type="submit" value="OK">
                    </form>
                </div>
{/if}