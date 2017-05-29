{include file='common/header.tpl'}
{if $USERNAME}
{include file='common/userMenuRegistered.tpl'}
{else}
{include file='common/userMenuUnregistered.tpl'}
{/if}