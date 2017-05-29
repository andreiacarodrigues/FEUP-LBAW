{include file='common/header.tpl'}
{if $USERNAME}
{include file='common/adminMenuRegistered.tpl'}
{else}
{include file='common/adminMenuUnregistered.tpl'}
{/if}